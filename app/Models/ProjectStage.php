<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
    use HasFactory;
    protected $fillable = ['title','module_id'];
    public function scopeOnlyJob($query)
    {
        return $query->where('module_id',Module::$Job);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class,'project_stage_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
