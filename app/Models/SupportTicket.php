<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $guarded = ['id'];
    protected $table="support_tickets";
    public const Model_NameSpace = "App\Models\SupportTicket";

    public function getFullnameAttribute()
    {
        return $this->name;
    }

    public function getUsernameAttribute()
    {
        return $this->email;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supportMessage(){
        return $this->hasMany(SupportMessage::class);
    }

    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }
}
