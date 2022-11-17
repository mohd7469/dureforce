<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class SupportTicketController extends Controller
{
    public function tickets()
    {
        $pageTitle = 'Support Tickets';
        $emptyMessage = 'No Data found.';
        $items = SupportTicket::orderBy('id','desc')->with('user')->paginate(getPaginate());
        return view('admin.support.tickets', compact('items', 'pageTitle','emptyMessage'));
    }
    public function index()
    {

        $tickets = SupportTicket::orderBy('id','desc')->with(['status','priority','supportMessage'])->get();

        $pageTitle = "Support Tickets";

        return view('admin.support.index', compact( 'pageTitle','tickets'));
    }

    public function openTickets()
    {

        $tickets = SupportTicket::orderBy('id','desc')->where('status_id',SupportTicket::$Open)->with(['status','priority','supportMessage'])->get();
        $pageTitle = "Support Tickets";
        return view('admin.support.index', compact( 'pageTitle','tickets'));
    }

    public function closedTicket()
    {
        $tickets = SupportTicket::orderBy('id','desc')->where('status_id',SupportTicket::$Closed)->with(['status','priority','supportMessage'])->get();
        $pageTitle = "Support Tickets";
        return view('admin.support.index', compact( 'pageTitle','tickets'));
    }

    public function onHoldTicket()
    {
        $tickets = SupportTicket::orderBy('id','desc')->where('status_id',SupportTicket::$OnHold)->with(['status','priority','supportMessage'])->get();
        $pageTitle = "Support Tickets";
        return view('admin.support.index', compact( 'pageTitle','tickets'));
    }


    public function storeComment(Request $request,$ticket_no)
    {
        $request->validate([
            'message' => 'required'
        ],
            ['message.required'=>"Comment field is required"]
        );
        $support_ticket = SupportTicket::where('ticket_no', '=', $ticket_no)->first();

        $user = auth()->guard('admin')->user();


        $message =SupportMessage::create([
            "admin_id"=>$user->id,
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
        $notify[] = ['success', 'Comment added successfully!'];
        return redirect()->route('admin.ticket.view',$ticket_no);
    }

    public function ticketReply($id)
    {
        $ticket = SupportTicket::with('user')->where('id', $id)->firstOrFail();
        $pageTitle = 'Reply Ticket';
        $messages = SupportMessage::with('ticket')->where('supportticket_id', $ticket->id)->orderBy('id','desc')->get();
        return view('admin.support.reply', compact('ticket', 'messages', 'pageTitle'));
    }

    public function show($ticket)
    {
        try {
            $support_ticket=SupportTicket::where('ticket_no',$ticket)->with('user.basicProfile','status','priority','attachments')->firstOrFail();
            $pageTitle = "Support Ticket Details";
            $statuses = Status::where('type','App\Models\SupportTicket')->get();
            $priorties = Status::where('type','priority')->get();
            return view('admin.support.ticket_details', compact( 'pageTitle','support_ticket','statuses','priorties'));
        } catch (\Exception $exp) {
            DB::rollback();
            return response()->json(["error" => $exp->getMessage()]);
        }
    }

    public function changeSattus(Request $request,$ticket_no)
    {
        $ticket = SupportTicket::findOrFail($request->priority_id);
        $ticket->status_id = $request->status_id;
        $ticket->updated_at = Carbon::now();
        $ticket->save();
        $notify[] = ['success', 'Status has been changed'];
        return redirect('admin/tickets/view/'.$ticket_no)->withNotify($notify);
    }

    public function changePriority(Request $request, $ticket_no)
    {
        $ticket = SupportTicket::findOrFail($request->priority_id);
        $ticket->priority_id = $request->status_id;
        $ticket->updated_at = Carbon::now();
        $ticket->save();
        $notify[] = ['success', 'Priority has been changed'];
        return redirect('admin/tickets/view/'.$ticket_no)->withNotify($notify);
    }

    public function ticketReplySend(Request $request, $id)
    {
        $ticket = SupportTicket::with('user')->where('id', $id)->firstOrFail();
        $message = new SupportMessage();
        if ($request->replayTicket == 1) {

            $attachments = $request->file('attachments');
            $allowedExts = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');

            $this->validate($request, [
                'attachments' => [
                    'max:4096',
                    function ($attribute, $value, $fail) use ($attachments, $allowedExts) {
                        foreach ($attachments as $attachment) {
                            $ext = strtolower($attachment->getClientOriginalExtension());
                            if (($attachment->getSize() / 1000000) > 2) {
                                return $fail("Miximum 2MB file size allowed!");
                            }

                            if (!in_array($ext, $allowedExts)) {
                                return $fail("Only png, jpg, jpeg, pdf, doc, docx files are allowed");
                            }
                        }
                        if (count($attachments) > 5) {
                            return $fail("Maximum 5 files can be uploaded");
                        }
                    }
                ],
                'message' => 'required',
            ]);
            $ticket->status = 1;
            $ticket->last_reply = Carbon::now();
            $ticket->save();

            $message->supportticket_id = $ticket->id;
            $message->admin_id = Auth::guard('admin')->id();
            $message->message = $request->message;
            $message->save();

            $path = imagePath()['ticket']['path'];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
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

            notify($ticket, 'ADMIN_SUPPORT_REPLY', [
                'ticket_id' => $ticket->ticket,
                'ticket_subject' => $ticket->subject,
                'reply' => $request->message,
                'link' => route('ticket.view',$ticket->ticket),
            ]);

            $notify[] = ['success', "Support ticket replied successfully"];

        } elseif ($request->replayTicket == 2) {
            $ticket->status = 3;
            $ticket->save();
            $notify[] = ['success', "Support ticket closed successfully"];
        }
        return back()->withNotify($notify);
    }


    public function ticketDownload($ticket_id)
    {
        $attachment = SupportAttachment::findOrFail(decrypt($ticket_id));
        $file = $attachment->attachment;


        $path = imagePath()['ticket']['path'];

        $full_path = $path.'/' . $file;
        $title = slug($attachment->supportMessage->ticket->subject).'-'.$file;
        $mimetype = mime_content_type($full_path);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($full_path);
    }
    public function ticketDelete(Request $request)
    {
        $message = SupportMessage::findOrFail($request->message_id);
        $path = imagePath()['ticket']['path'];
        if ($message->attachments()->count() > 0) {
            foreach ($message->attachments as $attachment) {
                removeFile($path.'/'.$attachment->attachment);
                $attachment->delete();
            }
        }
        $message->delete();
        $notify[] = ['success', "Delete successfully"];
        return back()->withNotify($notify);

    }

}
