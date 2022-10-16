<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    use HasFactory;

     protected $table =  "user_companies";

    protected $fillable = [
        'name',
        'logo',
        'number',
        'email',
        'country_id',
        'vat',
        'website',
        'facebook_url',
        'linked_url',
        'user_id'
    ];

    protected $casts = [

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
