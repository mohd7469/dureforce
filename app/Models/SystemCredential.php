<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemCredential extends Model
{
    use HasFactory, SoftDeletes;
    public const Type_Redis = "redis";
    protected $fillable = ['name','host','password','port','database','prefix','client','type','is_active'];
}
