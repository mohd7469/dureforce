<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageLevel extends Model
{
    use HasFactory;


    protected $fillable = [
        'name'
    ];

    public function language()
    {
        return $this->hasMany(Language::class);
    }
}
