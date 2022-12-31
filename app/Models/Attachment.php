<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'uploaded_name',
        'url',
        'name',
        'type',
        'is_published',
        'section_typr',
        'section_id'
    ];
}
