<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class InviteFreelancer extends Model
{
    use HasFactory, SoftDeletes;

    public static $EMAIL_TEMPLATE="job_invitation_email_template";

    protected $fillable = [

        "uuid",
        "user_id",
        "job_id",
        "message",
        "is_active",
        "accepted_at",

    ];

    protected static function boot()
    {

        parent::boot();
        static::saving(function ($model) {
            $uuid = Str::uuid()->toString();
            $model->uuid = $uuid;
        });


    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->with(['user_basic','country','skills']);
    }
}
