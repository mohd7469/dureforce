<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDocument extends Model
{
    use HasFactory;
    public function module()
    {
        return $this->morphTo();
    }
}
