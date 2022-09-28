<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBasic extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'city_id',
        'profile_picture',
        'designation',
        'about',
        'phone_number',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
