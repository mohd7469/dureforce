<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'world_countries';

    public function job(){

        return  $this->belongsTo(Job::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function continent()
    {
        return $this->hasMany(Continent::class,'id');
    }

 
}
