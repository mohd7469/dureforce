<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public static $ENGLISH_LANGUAGE_ID=41;
    public static $Model_Name_Space = "App\Models\Language";
    public static $Redis_key = "languages";
    public static $Is_Active = 1;
    protected $guarded = ['id'];

    public function level()
    {
        return $this->belongsTo(LanguageLevel::class);
    }
}
