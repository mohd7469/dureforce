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
}
