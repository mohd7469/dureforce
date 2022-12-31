<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $guarded = ['id'];
    protected $table="support_tickets";
    public const Model_NameSpace = "App\Models\SupportTicket";
    //Tickets Statuses
    public static $Open=4;
    public static $Closed=5;
    public static $OnHold=6;
    
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
        return $this->belongsTo(User::class)->with('basicProfile');
    }

    public function supportMessage(){
        return $this->hasMany(SupportMessage::class);
    }

    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function priority()
    {
        return $this->belongsTo(Status::class, 'priority_id');
    }
}
