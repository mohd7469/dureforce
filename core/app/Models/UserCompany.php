<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'phone',
        'email',
        'location',
        'vat',
        'url',
        'facebook_url',
        'linkedin_url',
        'user_id'
    ];

    protected $casts = [

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
