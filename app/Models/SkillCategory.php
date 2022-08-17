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
}
