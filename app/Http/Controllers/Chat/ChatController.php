<?php

namespace App\Http\Controllers\Chat;

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
        $users=User::where('last_role_activity',Role::$Freelancer)->where('id','!=',Auth()->user()->id)->with('basicProfile')->get();
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
        ChatMessage::create($request->all());
        return response()->json(['message' => 'message successfully added']);
    }
}
