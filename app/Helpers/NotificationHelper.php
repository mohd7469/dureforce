<?php

namespace App\Helpers;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class NotificationHelper
{

    public static function generateNotificationData($title, $body, $payload, $url, $notification_type, $extra_params = null)
    {

        return [
            'title' => $title,
            'body' => $body,
            'url' => getBaseUrl() . $url,
            'notification_type' => $notification_type,
            'payload' => $payload
        ];
    }

    public static function GENERATENOTIFICATION($notification, $users)
    {
        Log::info('Notification data', [$notification]);

        $users = array_unique($users);


        $current_timestamps = Carbon::now()->toDateTimeString();
        try {

            foreach ($users as $user) {
                $data = [];
                $data['title'] = $notification['title'];
                $data['body'] = $notification['body'];
                $data['url'] = isset($notification['url']) ? $notification['url'] : '#';
                $data['notification_type'] = isset($notification['notification_type']) ? $notification['notification_type'] : 'service_request';
                $data['user_id'] = $user;
                $data['payload'] = isset($notification['payload']) ? json_encode($notification['payload']) : '';
                $data['created_at'] = $current_timestamps;
                $data['updated_at'] = $current_timestamps;
                $data['uuid'] = Uuid::uuid4()->toString();
                Notification::insert($data);

            }

        } catch (\Throwable $error) {

            Log::info('In App Notification Error', [$error->getMessage()]);

        }
    }

    public static function getUserNotification()
    {
        try {
            $user = auth()->user();
            if ($user) {
                $notification = Notification::where('user_id', $user->id)->OrderByUnread()->get();
                Log::info(["Notification"=>$notification]);
                return $notification;
            }
        } catch (\Exception $exp) {
            DB::rollback();
            Log::error($exp->getMessage());
            return [];
        }
    }
}