<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{

    protected $guarded = ['id'];
    protected $table = "support_messages";

    public function ticket(){
        return $this->belongsTo(SupportTicket::class, 'supportticket_id', 'id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')->with('basicProfile');
    }
    public function supportTicket(){
        return $this->belongsTo(SupportTicket::class, 'support_ticket_id',);
    }

//    public function attachments()
//    {
//        return $this->hasMany('App\Models\SupportAttachment','support_message_id','id');
//    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }

}
