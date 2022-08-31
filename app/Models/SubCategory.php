<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $hidden = ['pivot','created_at','updated_at','deleted_at'];


    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id')->where('status', Category::ACTIVE);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attributes');
    }
    public function skill()
    {
        return $this->belongsToMany(Skills::class, 'category_attributes');
    }
}
