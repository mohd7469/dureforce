<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminPasswordReset extends Model
{
    use HasFactory;
    protected $table = "admin_password_resets";
    protected $guarded = ['id'];
    public $timestamps = false;
}
