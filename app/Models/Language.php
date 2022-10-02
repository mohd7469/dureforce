<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public static $ENGLISH_LANGUAGE_ID=41;

    protected $guarded = ['id'];

    public function level()
    {
        return $this->belongsTo(LanguageLevel::class);
    }
}
