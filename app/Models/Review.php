<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function reviewable()
    {
        return $this->morphTo();
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
