<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends BaseModel
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



    public function scopeOrderByUnread($query){
        return $query->orderBy('is_read', 'DESC');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


