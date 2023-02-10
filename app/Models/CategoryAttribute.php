<?php

namespace App\Models;

use App\Http\Controllers\SkillCategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttribute extends Model
{
    use HasFactory,SoftDeletes;
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $table="category_attributes";
    
    protected $fillable = ['category_id','sub_category_id','skills_id'];

    public static function scopeWithAll($query){

        return $query->with('category')->with('subCategory')->with('skill');

    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id');
    }

    public function subCategory()
    {
        return $this->hasOne(SubCategory::class, 'id');
    }
    public function skill()
    {
        return $this->hasOne(Skills::class, 'id');
    }

}

