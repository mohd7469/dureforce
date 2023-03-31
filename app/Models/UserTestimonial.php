<?php

namespace App\Models;

use App\Traits\DatabaseOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class UserTestimonial extends Model
{
    use HasFactory,SoftDeletes,DatabaseOperations;

    protected $guarded = ['id','uuid','is_approved','token'];
    
    protected static function boot()
    {
        
        parent::boot();
        static::creating(function ($model)  {
            $uuid=Str::uuid()->toString();
            $token=Str::uuid()->toString();
            $model->uuid =  $uuid;
            $model->token = $token;
        });

    }

    public const STATUSES = [
        'Requested'  =>  36,
        'WaitingApproval' =>  37,
        'Accepted' =>  38,
        'Rejected' =>  39

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withAll();
    }
    public function scopeApproved($query){
        return $query->where('status_id',self::STATUSES['Accepted']);
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');

    }
}
