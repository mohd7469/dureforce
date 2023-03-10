<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class UserTestimonial extends Model
{
    use HasFactory,SoftDeletes;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
