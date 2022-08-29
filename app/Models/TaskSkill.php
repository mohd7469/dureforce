<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSkill extends Model
{
    use HasFactory;
    public function job()
    {
        return $this->morphedByMany(Job::class, 'task_skill');
    }

    public function skill()
    {
        return $this->morphedByMany(Skills::class, 'task_skill','task_skills','skill_id');
    }
}
