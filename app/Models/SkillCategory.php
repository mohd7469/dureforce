<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    use HasFactory;
    
    public function moduleSkill()
    {
        return $this->belongsTo(ModuleSkill::class, 'skill_category_id');
    }
    public function skill_sub_category()
    {

        return $this->hasMany(SkillSubCategory::class, 'skill_category_id');

    }
    protected static function boot()
    {
        
        parent::boot();
        static::saving(function ($model)  {
            
            $model->slug = \Str::slug($model->name);
        });


    }
}
