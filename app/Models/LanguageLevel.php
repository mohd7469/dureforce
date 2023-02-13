<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageLevel extends Model
{
    use HasFactory, SoftDeletes;

    public static $Model_Name_Space = "App\Models\LanguageLevel";
    public static $Redis_key = "languageLevel";
    public static $Is_Active = 1;

    protected $fillable = [
        'name'
    ];

    public function language()
    {
        return $this->hasMany(Language::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
