<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttribute extends Model
{
    use HasFactory,SoftDeletes;
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $table="category_attributes";
    
    protected $fillable = ['category_id','sub_category_id','skills_id'];
}

