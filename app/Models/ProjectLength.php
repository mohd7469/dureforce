<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLength extends Model
{
    use HasFactory;

    public static $Model_Name_Space = "App\Models\ProjectLength";
    public static $Redis_key = "project_length";
    public static $Is_Active = 1;

    public function scopeOnlyJob($query)
    {
        return $query->where('module_id',Module::$Job);
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class,'project_length_id');
    }
}
