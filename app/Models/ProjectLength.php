<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLength extends Model
{
    use HasFactory;
    public const Model_Name_Space = "App\Models\ProjectLength";
    public const Redis_Key = "project_length";
    public function scopeOnlyJob($query)
    {
        return $query->where('module_id',Module::$Job);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class,'project_length_id');
    }
}
