<?php

namespace App\Models\Software;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareDefaultStep extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }
}
