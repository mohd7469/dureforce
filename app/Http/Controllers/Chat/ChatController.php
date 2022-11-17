<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessageDeleteEvent;
use App\Events\MessageEditedEvent;
use App\Events\NewMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Job;
use App\Models\ModuleChatUser;
use App\Models\Proposal;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ChatController extends Controller
{
    public function getUsers()
    {
        $user_id=auth()->user()->id;
        if(getLastLoginRoleName() ==Role::$ClientName)
        {
            $user_job_ids=Job::has('messages')->where('user_id',$user_id)->get()->pluck('id')->toArray();
            $users=ModuleChatUser::with('send_to_user')->whereIn('module_id',$user_job_ids)->get();

        }
        else
        {
            $users=ModuleChatUser::with('user')->where('sender_id',$user_id)->get();
            $users = $users->map(function ($item) {
                
                 $item->send_to_user = $item->user; 
                return $item;
            });
            
           
            // dd($users->toArray());

        }

        return response()->json(['users'=> $users]);
    }

    public function getUserChat(Request $request)
    {
        $send_to_id=$request->send_to_id;
        $job_id=$request->job_id;
        $job=Job::findOrFail($job_id);
        $messages=$job->messages()->whereIn('sender_id',[auth()->user()->id,$send_to_id])->whereIn('send_to_id',[auth()->user()->id,$send_to_id])->get();
        return response()->json(['messages' => $messages]);
    }

    public function saveMessage(Request $request)
    {
        try {

            $job=job::findOrFail($request->module_id);
            $request->request->add(['sender_id' => auth()->user()->id,'role' => strtolower(getLastLoginRoleName())]);
            $message=ChatMessage::updateOrCreate(['id' =>$request->id],$request->all());
            if(!$message->wasRecentlyCreated && $message->wasChanged()){
                event(new MessageEditedEvent($message, $message->user,$job));

            }
            else
                event(new NewMessageEvent($message, $message->user,$job));

            
            $job->chatUsers()->firstOrNew(['sender_id'=> auth()->user()->id,'send_to_id' =>$request->send_to_id],[]);
            
                
            return response()->json(['message' => 'message successfully added']);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    public function deleteMessage(Request $request, ChatMessage $chat_message_id)
    {

       $job=job::findOrFail($chat_message_id->module_id);
       $chat_message_id->delete();

       event(new MessageDeleteEvent($chat_message_id, $chat_message_id->user,$job));

        return response()->json(['message' => 'message Deleted Successfully']);
    }

    public function savePropsalMessage($propsal_id)
    {
        $proposal=Proposal::with('job')->where('uuid',$propsal_id)->first();
        $job=$proposal->job;
        $job->messages()->updateOrCreate(
            ['proposal_id' =>  $proposal->id],
            [
                'sender_id' => $proposal->user_id,
                'send_to_id' => $job->user_id,
                'message'   => $proposal->cover_letter,
                'role'      =>  strtolower(Role::$FreelancerName)
            ]
        );
        $job->chatUsers()->updateOrCreate(['sender_id'=> $proposal->user_id,'send_to_id' =>$job->user_id],[]);
        return redirect()->route('chat.inbox');
    }
}
