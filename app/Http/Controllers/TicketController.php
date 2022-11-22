<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Status;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{

    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }


    public function supportTicket()
    {
        if (!Auth::user()) {
            abort(404);
        }


        $user = auth()->user();

        $tickets = SupportTicket::with(['status','priority','supportMessage'])->where('role_id', $user->last_role_activity)->where('user_id', $user->id)->orderBy('id','desc')->get();

        $pageTitle = "Support Tickets";
        return view($this->activeTemplate . 'user.support.index', compact('tickets', 'pageTitle'));
    }


    public function create(Request $request)
    {
        try {

            $pageTitle = "Create Support Ticket";
            $user = auth()->user();
            $priorities = Status::where('type',Status::$Priority)->get();
            return view($this->activeTemplate . 'user.support.create_ticket', compact('user', 'pageTitle','priorities'));

        } catch (\Exception $exp) {
            DB::rollback();
            return response()->json(["error" => $exp->getMessage()]);
        }

    }


    public function openSupportTicket()
    {
        if (!Auth::user()) {
            abort(404);
        }
        $pageTitle = "Support Tickets";
        $user = Auth::user();
        return view($this->activeTemplate . 'user.support.create', compact('pageTitle', 'user'));
    }

    public function storeSupportTicket(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();

        $files = $request->file('attachments');
        $allowedExts = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
        do {
            $ticket_no = rand(1, 1000000000);
            $ticket_exists = SupportTicket::where('ticket_no', '=', $ticket_no)->first();
        } while (!$ticket_exists);

        $this->validate($request, [
            'attachments' => [
                'max:4096',
                function ($attribute, $value, $fail) use ($files, $allowedExts) {
                    foreach ($files as $file) {
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (($file->getSize() / 1000000) > 2) {
                            return $fail("Miximum 2MB file size allowed!");
                        }
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg, pdf, doc, docx files are allowed");
                        }
                    }
                    if (count($files) > 5) {
                        return $fail("Maximum 5 files can be uploaded");
                    }
                },
            ],
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
            'priority' => 'required|in:1,2,3',
        ]);

        $user = auth()->user();
        $ticket->user_id = $user->id;
        $random = rand(100000, 999999);
        $ticket->ticket = $random;
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->priority = $request->priority;
        $ticket->save();

        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();


        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New support ticket has opened';
        $adminNotification->click_url = urlPath('admin.ticket.view', $ticket->id);
        $adminNotification->save();


        $path = imagePath()['ticket']['path'];
        if ($request->hasFile('attachments')) {
            foreach ($files as $file) {
                try {
                    $attachment = new SupportAttachment();
                    $attachment->support_message_id = $message->id;
                    $attachment->attachment = uploadFile($file, $path);
                    $attachment->save();
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Could not upload your file'];
                    return back()->withNotify($notify);
                }
            }
        }
        $notify[] = ['success', 'ticket created successfully!'];
        return redirect()->route('ticket')->withNotify($notify);
    }

    public function  validateTicket(Request $request)
    {
        $request_data = [];
        parse_str($request->data, $request_data);
        $validator = Validator::make($request_data,[
            'subject' => 'required',
            'priority_id' => 'required',
            'message'     => 'required'
        ]);

        if ($validator->fails()) {

            return response()->json(["error" => $validator->errors()]);

        } else
            return response()->json(["validated" => "Ticket Data Is Valid"]);
    }

    public function store(Request $request)
    {
        $request_data = [];
        parse_str($request->data, $request_data);
        $user = auth()->user();

        do {
            $ticket_no = rand(1, 1000000000);
            $ticket_exists = SupportTicket::where('ticket_no', '=', $ticket_no)->first();
        } while ($ticket_exists);

        $ticket =SupportTicket::create([
            "user_id"=>$user->id,
            "role_id"=>$user->last_role_activity,
            "priority_id"=>$request_data['priority_id'],
            "status_id"=>SupportTicket::$Open,
            "ticket_no"=>$ticket_no,
            "subject"=>$request_data['subject'],
            "message"=>$request_data['message'],
        ]);
        if ($request->hasFile('file')) {

            foreach ($request->file as $file) {
                $path = imagePath()['attachments']['path'];
                try {
                    
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $uploaded_name = $file->getClientOriginalName();
                
                    $ticket->attachments()->create([

                        'name' => $filename,
                        'uploaded_name' => $uploaded_name,
                        'url'           => $url,
                        'type' =>$file_extension,
                        'is_published' =>1

                    ]);

                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Document could not be uploaded.'];
                    return back()->withNotify($notify);
                }

            }
        }
        $notify[] = ['success', 'ticket created successfully!'];
        return response()->json(['redirect' => route('ticket')]);
    }

    public function storeComment(Request $request,$ticket_no)
    {
        $request->validate([
            'message' => 'required'
        ],
            ['message.required'=>"Comment field is required"]
        );
        $support_ticket = SupportTicket::where('ticket_no', '=', $ticket_no)->first();

        $user = auth()->user();

        $message =SupportMessage::create([
            "user_id"=>$user->id,
            "support_ticket_id"=>$support_ticket->id,
            "message"=>$request['message'],
        ]);
       
       if ($request->hasFile('comment_attachment')) {
        try {
                foreach ($request->file('comment_attachment') as $file) {
                    $path = imagePath()['attachments']['path'];
            
                    $filename = uploadAttachments($file, $path);
                    $file_extension = getFileExtension($file);
                    $url = $path . '/' . $filename;
                    $uploaded_name = $file->getClientOriginalName();

                    $message->attachments()->create([

                        'name' => $filename,
                        'uploaded_name' => $uploaded_name,
                        'url'           => $url,
                        'type' =>$file_extension,
                        'is_published' =>1

                    ]);

                 }
            }
        catch (\Exception $exp) {
            $notify[] = ['error', 'Document could not be uploaded.'];
            return back()->withNotify($notify);
        }
        
                          
       }
        $notify[] = ['success', 'ticket created successfully!'];
        return redirect()->route('ticket.view',$ticket_no);
    }


    public function viewTicket($ticket)
    {
        $pageTitle = "Support Tickets";
        $userId = 0;
        if (Auth::user()) {
            $userId = Auth::id();
        }
        $my_ticket = SupportTicket::where('ticket', $ticket)->where('user_id', $userId)->orderBy('id', 'desc')->firstOrFail();
        $messages = SupportMessage::where('supportticket_id', $my_ticket->id)->orderBy('id', 'desc')->get();
        $user = auth()->user();
        if ($user) {
            return view($this->activeTemplate . 'user.support.view', compact('my_ticket', 'messages', 'pageTitle', 'user'));
        } else {
            return view($this->activeTemplate . 'ticket_view', compact('my_ticket', 'messages', 'pageTitle'));
        }

    }

//    public function show($ticket)
//    {
//        $pageTitle = "Support Tickets";
//        $userId = 0;
//        if (Auth::user()) {
//            $userId = Auth::id();
//        }
//        $my_ticket = SupportTicket::where('ticket', $ticket)->where('user_id', $userId)->orderBy('id', 'desc')->firstOrFail();
//        $messages = SupportMessage::where('supportticket_id', $my_ticket->id)->orderBy('id', 'desc')->get();
//        $user = auth()->user();
//        if ($user) {
//            return view($this->activeTemplate . 'user.support.view', compact('my_ticket', 'messages', 'pageTitle', 'user'));
//        } else {
//            return view($this->activeTemplate . 'ticket_view', compact('my_ticket', 'messages', 'pageTitle'));
//        }
//
//    }
    public function show($ticket)
    {
        try {
            $support_ticket=SupportTicket::where('ticket_no',$ticket)->with('user.basicProfile','status','priority','attachments','supportMessage.user.basicProfile')->firstOrFail();
            $pageTitle = "Support Ticket Details";
            return view($this->activeTemplate . 'user.support.ticket_details', compact( 'pageTitle','support_ticket'));
        } catch (\Exception $exp) {
            DB::rollback();
            return response()->json(["error" => $exp->getMessage()]);
        }

    }

    public function replyTicket(Request $request, $id)
    {
       
        $userId = 0;
        if (Auth::user()) {
            $userId = Auth::id();
        }
        $ticket = SupportTicket::where('user_id', $userId)->where('id', $id)->firstOrFail();
        $message = new SupportMessage();
        if ($request->replayTicket == 1) {
            $attachments = $request->file('attachments');
            $allowedExts = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
            $this->validate($request, [
                'attachments' => [
                    'max:4096',
                    function ($attribute, $value, $fail) use ($attachments, $allowedExts) {
                        foreach ($attachments as $file) {
                            $ext = strtolower($file->getClientOriginalExtension());
                            if (($file->getSize() / 1000000) > 2) {
                                return $fail("Miximum 2MB file size allowed!");
                            }
                            if (!in_array($ext, $allowedExts)) {
                                return $fail("Only png, jpg, jpeg, pdf doc docx files are allowed");
                            }
                        }
                        if (count($attachments) > 5) {
                            return $fail("Maximum 5 files can be uploaded");
                        }
                    },
                ],
                'message' => 'required',
            ]);

            $ticket->status = 2;
            $ticket->last_reply = Carbon::now();
            $ticket->save();

            $message->supportticket_id = $ticket->id;
            $message->message = $request->message;
            $message->save();

            $path = imagePath()['ticket']['path'];

            if ($request->hasFile('attachments')) {
                foreach ($attachments as $file) {
                    try {
                        $attachment = new SupportAttachment();
                        $attachment->support_message_id = $message->id;
                        $attachment->attachment = uploadFile($file, $path);
                        $attachment->save();

                    } catch (\Exception $exp) {
                        $notify[] = ['error', 'Could not upload your ' . $file];
                        return back()->withNotify($notify)->withInput();
                    }
                }
            }

            $notify[] = ['success', 'Support ticket replied successfully!'];
        } elseif ($request->replayTicket == 2) {
            $ticket->status = 3;
            $ticket->last_reply = Carbon::now();
            $ticket->save();
            $notify[] = ['success', 'Support ticket closed successfully!'];
        } else {
            $notify[] = ['error', 'Invalid request'];
        }
        return back()->withNotify($notify);

    }


    public function ticketDownload($ticket_id)
    {
        $attachment = SupportAttachment::findOrFail(decrypt($ticket_id));
        $file = $attachment->attachment;

        $path = imagePath()['ticket']['path'];
        $full_path = $path . '/' . $file;

        $title = slug($attachment->supportMessage->ticket->subject);
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($full_path);


        header('Content-Disposition: attachment; filename="' . $title . '.' . $ext . '";');
        header("Content-Type: " . $mimetype);
        return readfile($full_path);
    }

}
