<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    protected $fillable = ['sender_id','send_to_id','message','role','module_type','module_id','proposal_id','is_attachment'];
    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id')->with('basicProfile');
    }
    public function send_to_user()
    {
        return $this->belongsTo(User::class, 'send_to_id')->with('basicProfile');
    }
    public function attachment(){
        return $this->morphone(Attachment::class,'section');
    }
}
