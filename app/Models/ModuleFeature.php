<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleFeature extends Model
{
    use HasFactory;
    protected $fillable = ['module_type','module_id','feature_id'];
}
