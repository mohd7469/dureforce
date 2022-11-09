<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        try{
            $pageTitle = 'Subscriber Manager';
            $emptyMessage = 'No subscriber yet.';
            $subscribers = Subscriber::orderBy('id','desc')->paginate(getPaginate());
            return view('admin.subscriber.index', compact('pageTitle', 'emptyMessage', 'subscribers'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
     
    }

    public function sendEmailForm()
    {
        try{
            $pageTitle = 'Send Email to Subscribers';
        return view('admin.subscriber.send_email', compact('pageTitle'));
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
        
    }

    public function remove(Request $request)
    {
        try{
            $request->validate(['subscriber' => 'required|integer']);
            $subscriber = Subscriber::findOrFail($request->subscriber);
            $subscriber->delete();
    
            $notify[] = ['success', 'Subscriber has been removed'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
     
    }

    public function sendEmail(Request $request)
    {
        try{
            $request->validate([
                'subject' => 'required',
                'body' => 'required',
            ]);
            $subscriber = Subscriber::first();
            if (!$subscriber){
                $notify[] = ['error','No subscribers to send email'];
                return back()->withAlert();
            }
    
            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber) {
                $receiver_name = explode('@', $subscriber->email)[0];
                sendGeneralEmail($subscriber->email, $request->subject, $request->body, $receiver_name);
            }
            $notify[] = ['success', 'Email will be sent to all subscribers.'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
                   DB::rollback();
                   return view('errors.500');
               }
      
    }
}
