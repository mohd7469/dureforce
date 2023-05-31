<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskDocument extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'uploaded_name',
        'url',
        'name',
        'type',
        'is_published',
        'section_type',
        'section_id'
    ];
    
    public function module()
    {
        return $this->morphTo();
    }
    public function taskDocument()
    {
        return $this->belongsToMany(Job::class, 'id');
    }

}
