<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    protected $table = "skill_sub_categories";
    protected $hidden = ['pivot','created_at','updated_at','deleted_at'];
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
    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'module_skills','skill_id','skill_sub_category_id');
    }
    public function skill_categories()
    {
        return $this->belongsToMany(SkillCategory::class, 'module_skills');
    }

}
