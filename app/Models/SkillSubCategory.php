<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSubCategory extends Model
{
    use HasFactory;
    public function moduleSkill()
    {
        return $this->belongsTo(ModuleSkill::class, 'skill_sub_category_id');
    }
    public function skill_category()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }
    protected static function boot()
    {
        
        parent::boot();
        static::saving(function ($model)  {
            
            $model->slug = \Str::slug($model->name);
        });

    }

}
