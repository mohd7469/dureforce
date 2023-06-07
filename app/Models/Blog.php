<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $table = 'blogs';
    public const Model_NameSpace = "App\Models\Blog";
    protected $fillable = [
        'title',
        'description',
        "is_active",
        "user_id",
        "is_active",
        "is_featured",
    ];
    const UPDATED_AT = null;

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }
    public function documents()
    {
        return $this->morphMany(Blog::class, 'module');
    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }

}
