<?php

namespace App\Models;

use App\Models\Country as ModelsCountry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Khsing\World\Models\Country;

class UserPayment extends Model
{
    use HasFactory, SoftDeletes;


    const ACTIVE = 1;
    const ISPRIMARY = 1;
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
        'user_id',
        'is_primary'
    ];

    protected $casts  = [

    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function country()
    {
        return $this->belongsTo(ModelsCountry::class)->with('cities');
    }
    
}
