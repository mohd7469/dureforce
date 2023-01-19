<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorldLanguage extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = ['iso_language_name','native_name','iso2','iso3'];

}
