<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleSkill extends Model
{
    use HasFactory;
    public function skill()
    {
        return $this->hasMany(Skills::class, 'skill_id');
    }
    public function skillCategory()
    {
        return $this->hasMany(SkillCategory::class, 'skill_category_id');
    }
    public function skillSubCategory()
    {
        return $this->hasMany(SkillSubCategory::class, 'skill_sub_category_id');
    }
    public function module()
    {
        return $this->hasMany(Module::class, 'module_id');
    }


}
