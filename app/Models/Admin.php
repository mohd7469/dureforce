<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'staff_access' => 'object',
    ];

    protected static function boot()
    {

        parent::boot();
        static::creating(function ($model)  {
            $model->status = 1;
        });


    }

    public function admin_permissions()
    {

        return $this->belongsToMany(Admin::class, 'admin_permissions','admin_id','permission_id');
    }
}
