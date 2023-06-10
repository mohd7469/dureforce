<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khsing\World\Models\City;

class Country extends Model
{
    use HasFactory;
    protected $table = 'world_countries';

    public static $Model_Name_Space = "App\Models\Country";
    public static $Redis_key = "countries";
    public static $Is_Active = 1;

    protected $fillable= ['continent_id'];
    
    public function job(){

        return  $this->belongsTo(Job::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function continent()
    {
        return $this->belongsTo(Continent::class,'continent_id');
    }
    public function scopeWithOutManual($query)
    {
        return $query->where('is_manual',false);
    }
 
}
