<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model
{
    use HasFactory;
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    public function job()
    {
        return $this->belongsToMany(DOD::class, 'job_dods');
    }
}
