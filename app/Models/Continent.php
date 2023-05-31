<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;
    protected $table = 'world_continents';

    public function country()
    {
        return $this->hasOne(Country::class, 'continent_id');
    }
}
