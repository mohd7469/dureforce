<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'blogs';
    public const Model_NameSpace = "App\Models\Blog";
    protected $fillable = [
        'title',
        'description',
        "is_active"
    ];
    const UPDATED_AT = null;

    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }

}
