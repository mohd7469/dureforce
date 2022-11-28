<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Banner extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'banner_backgrounds';
    public static $attachment_path = "attachments";
    protected $fillable = [
        "category_id",
        "sub_category_id",
        "document_type",
        "subject",
        'uploaded_name',
        'url',
        'name',
        'type',
        "is_active"
    ];
    const UPDATED_AT = null;

    public static function scopeWithAll($query){

        return $query->with('category')->with('subCategory');

    }
    
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id')->where('status', Category::ACTIVE);
    }
    public function subCategory()
    {
    	return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

}
