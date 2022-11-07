<?php

namespace App\Http\Controllers\Chat;

use App\Events\NewMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getUsers()
    {
        $users=User::where('id','!=',Auth()->user()->id)->with('basicProfile')->get();
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
        $request->request->add(['sender_id' => auth()->user()->id,'role' => strtolower(getLastLoginRoleName())]);
        $message=ChatMessage::updateOrCreate(['id' =>$request->id],$request->all());
        event(new NewMessageEvent($message, $message->user));
        return response()->json(['message' => 'message successfully added']);
    }

    public function deleteMessage(Request $request, ChatMessage $chat_message_id)
    {
       $chat_message_id->delete();
        return response()->json(['message' => 'message Deleted Successfully']);
    }
}
