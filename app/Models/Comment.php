<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'comments';

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function commentReply()
    {
        return $this->hasMany(CommentReply::class)->with('user');
    }
}
