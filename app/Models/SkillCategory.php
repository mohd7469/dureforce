<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    use HasFactory;
    protected $hidden = ['pivot','created_at','updated_at','deleted_at'];

    protected $fillable = ['name', 'slug'];
    protected $table = "skill_categories";

    public function moduleSkill()
    {
        return $this->belongsTo(ModuleSkill::class, 'skill_category_id');
    }

    public function skill()
    {

        return $this->hasMany(Skills::class, 'skill_category_id');

    }
    protected static function boot()
    {
        
        parent::boot();
        static::saving(function ($model)  {
            
            $model->slug = \Str::slug($model->name);
        });

    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attributes');
    }
    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'module_skills');
    }

}
