<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'world_countries';

    public const Model_Name_Space = "App\Models\Country";
    public const Redis_Key = "countries";
    public function job(){

        return  $this->belongsTo(Job::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

 
}
