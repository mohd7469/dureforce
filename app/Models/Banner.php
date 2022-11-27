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
        "document_type",
        "subject",
        'uploaded_name',
        'url',
        'name',
        'type',
        "is_active"
    ];
    const UPDATED_AT = null;
    
    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

}
