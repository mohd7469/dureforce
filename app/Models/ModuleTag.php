<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleTag extends Model
{
    use HasFactory;
    public function module()
    {
        return $this->morphTo();
    }
}
