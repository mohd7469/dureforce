<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    protected $table = "skill_sub_categories";
    public function moduleSkill()
    {
        return $this->belongsTo(ModuleSkill::class, 'skill_sub_category_id');
    }
}
