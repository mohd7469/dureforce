<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorldCities extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'world_cities';
    protected $fillable = ['country_id','division_id','name','full_name','code','iana_timezone'];
}
