<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskDocument extends Model
{
    use HasFactory,SoftDeletes;
    public function module()
    {
        return $this->morphTo();
    }
    public function taskDocument()
    {
        return $this->belongsToMany(Job::class, 'id');
    }


}
