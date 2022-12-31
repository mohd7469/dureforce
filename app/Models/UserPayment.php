<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class UserPayment extends Model
{
    use HasFactory, SoftDeletes;


    const ACTIVE = 1;
    const IN_ACTIVE = 0;

    protected $table = "user_payments";

    protected $fillable = [
        'card_number',
        'expiration_date',
        'cvv_code',
        'name_on_card',
        'country_id',
        'city_id',
        'address',
        'is_active',
        'user_id'
    ];

    protected $casts  = [

    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
