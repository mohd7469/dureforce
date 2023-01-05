<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageLevel extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name'
    ];

    public function language()
    {
        return $this->hasMany(Language::class);
    }
    public function modules()
    {
        return $this->hasMany(Module::class,'id');
    }
}
