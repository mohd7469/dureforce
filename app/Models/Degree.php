<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','is_active'];
    public static $Model_Name_Space = "App\Models\Degree";
    public static $Redis_key = "degrees";
}
