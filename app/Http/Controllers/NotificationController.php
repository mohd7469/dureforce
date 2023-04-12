<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function notification()
    {
        try {

            $user = auth()->user();
            if ($user) {
                $pageTitle = 'All Notifications';
                $notifications = Notification::where('user_id', $user->id)->OrderByUnread()->paginate(16);
                Log::info(["Notification" => $notifications]);
                return view('templates.basic.user.notification', compact('pageTitle', 'notifications'));
            }
        } catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'There is a technical error in deleting redis data.'];
            return back()->withNotify($notify);

        }

    }

    public function read($notification_uuid)
    {
        try {
            $notification = Notification::where('uuid', $notification_uuid)->first()->update(['is_read' => true]);
            Log::info(["View Single Notification" => $notification]);
            return redirect($notification->url);
        } catch (\Exception $exp) {
            Log::error($exp->getMessage());
            $notify[] = ['error', 'There is a technical error in deleting redis data.'];
            return back()->withNotify($notify);

        }

    }
}
