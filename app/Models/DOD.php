<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DOD extends Model
{
    use HasFactory;
    public function job()
    {
        return $this->belongsToMany(Job::class, 'job_dods');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

}
