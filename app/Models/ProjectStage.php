<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->hasMany(Job::class,'project_stage_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
