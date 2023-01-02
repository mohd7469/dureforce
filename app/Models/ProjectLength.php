<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLength extends Model
{
    use HasFactory;

    public function scopeOnlyJob($query)
    {
        return $query->where('module_id',Module::$Job);
    }

    public function modules()
    {
        return $this->hasMany(Module::class,'id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class,'project_length_id');
    }
}
