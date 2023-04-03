<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table='notifications';
    protected $fillable = [

        "uuid",
        "user_id",
        "title",
        "body",
        "payload",
        "url",
        "is_read",
        "notification_type",
        "deleted_at"
    ];

    public const URL = [
        "INVITATION" => "offer-detail/",
    ];
    public const NOTIFICATION_TYPE = [
        "INVITATION" => "invitation",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


