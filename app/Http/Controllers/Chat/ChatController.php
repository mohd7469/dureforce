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
use App\Models\Service;
use App\Models\Software\Software;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ChatController extends Controller
{
    public function getUsers()
    {
        $user_id=auth()->user()->id;
        if(getLastLoginRoleName() ==Role::$ClientName)
        {
            // $user_job_ids=Job::has('messages')->where('user_id',$user_id)->get()->pluck('id')->toArray();
            $users=ModuleChatUser::with('send_to_user')->with('module')->where('sender_id',auth()->user()->id)->orwhere('send_to_id',auth()->user()->id)->orderBy('updated_at','desc')->get();
            // dd($users->toArray());
        }
        else
        {
            $users=ModuleChatUser::with('user')->with('module')->where('sender_id',$user_id)->get();
            $users = $users->map(function ($item) {
                
                 $item->send_to_user = $item->user; 
                return $item;
            });
            
        }

        return response()->json(['users'=> $users]);
    }

    public function getUserChat(Request $request)
    {
        $send_to_id=$request->send_to_id;
        $module_id=$request->module_id;
        $module_type=$request->module_type;
        $chat_module=$module_type::findOrFail($module_id);
        $messages=$chat_module->messages()->whereIn('sender_id',[auth()->user()->id,$send_to_id])->whereIn('send_to_id',[auth()->user()->id,$send_to_id])->take(20)->get();

        return response()->json(['messages' => $messages]);
    }

    public function saveMessage(Request $request)
    {
        try {
            // dd($request->send_to_id,auth()->user()->id);
            $module_id=$request->module_id;
            $module_type=$request->module_type;
            $chat_module=$module_type::findOrFail($module_id);
            $request->request->add(['sender_id' => auth()->user()->id,'role' => strtolower(getLastLoginRoleName())]);
            $message=ChatMessage::updateOrCreate(['id' =>$request->id],$request->all());
            if(!$message->wasRecentlyCreated && $message->wasChanged()){
                event(new MessageEditedEvent($message, $message->user,$chat_module));

            }
            else
                event(new NewMessageEvent($message, $message->user,$chat_module));

            $chat_module->chatUsers()->firstOrNew(['sender_id'=> auth()->user()->id,'send_to_id' =>$request->send_to_id],[]);
         
            $chat_user=$chat_module->chatUsers()->where('sender_id',auth()->user()->id)->where('send_to_id',$request->send_to_id);
            if($chat_user->exists())
                $chat_user->first()->touch();
            $chat_user=$chat_module->chatUsers()->where('sender_id',$request->send_to_id)->where('send_to_id',auth()->user()->id);
            if($chat_user->exists())
                $chat_user->first()->touch();

                
            return response()->json(['message' => 'message successfully added']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failled to send message']);

        }
        
    }

    public function deleteMessage(Request $request, ChatMessage $chat_message_id)
    {

       $job=job::findOrFail($chat_message_id->module_id);
       $chat_message_id->delete();

       event(new MessageDeleteEvent($chat_message_id, $chat_message_id->user,$job));

        return response()->json(['message' => 'message Deleted Successfully']);
    }

    public function saveInitialMessage($model_uuid,$model)
    {
        if($model=='Proposal'){

            $proposal=Proposal::with('job')->where('uuid',$model_uuid)->first();
            $proposal->status_id=Proposal::STATUSES['ACTIVE'];
            $proposal->save();
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
            $job->chatUsers()->updateOrCreate(
                [
                    'sender_id'=> $proposal->user_id,
                    'send_to_id' =>$job->user_id,
                    'proposal_uuid' => $proposal->uuid
                ],
                []
            );

        }
        elseif($model=="Software"){

            $model_message=Software::where('uuid',$model_uuid)->first();
            $model_message->messages()->updateOrCreate(
                [
                    'module_id' =>  $model_message->id,
                    'module_type'   => 'App\Models\Software',
                    'message'   => $model_message->title,
                    
                ],
                [
                    'sender_id' => $model_message->user_id,
                    'send_to_id' => auth()->user()->id,
                    'role'      =>  strtolower(Role::$FreelancerName)
                ]
            );

            $model_message->chatUsers()->updateOrCreate(['sender_id'=> $model_message->user_id,'send_to_id' =>auth()->user()->id],[]);
        }
        else
        {
            $model_message=Service::where('uuid',$model_uuid)->first();
            $model_message->messages()->updateOrCreate(
                [
                    'module_id' =>  $model_message->id,
                    'module_type'   => 'App\Models\Service',
                    'message'   => $model_message->title,
                    
                ],
                [
                    'sender_id' => $model_message->user_id,
                    'send_to_id' => auth()->user()->id,
                    'role'      =>  strtolower(Role::$FreelancerName)
                ]
            );

            $model_message->chatUsers()->updateOrCreate(['sender_id'=> $model_message->user_id,'send_to_id' =>auth()->user()->id],[]);
        }

        return redirect()->route('chat.inbox');
    }
}
