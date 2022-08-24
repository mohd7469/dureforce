<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at','deleted_at'];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attributes');
    }
    public function sub_categoires()
    {
        return $this->belongsToMany(SubCategory::class, 'category_attributes');
    }
    public function skill_categories()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }
}
