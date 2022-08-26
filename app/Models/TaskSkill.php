<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSkill extends Model
{
    use HasFactory;
    public function job()
    {
        return $this->morphedByMany(Job::class, 'module_id');
    }

    public function skill()
    {
        return $this->morphedByMany(Skills::class, 'module_id');
    }
}
