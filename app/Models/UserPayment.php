<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserPayment extends Model
{
    use HasFactory;


    const ACTIVE = 1;
    const IN_ACTIVE = 0;


    protected $fillable = [
        'card_number',
        'expiration_date',
        'cvv_code',
        'name_on_card',
        'country',
        'city',
        'street_address',
        'street_address_two',
        'status',
        'user_id'
    ];

    protected $casts  = [

    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function(){

        });

        static::updating(function($model){
            if($model->isDirty('status')) {
                self::where("status", true)->update([
                    'status' => false
                ]);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
