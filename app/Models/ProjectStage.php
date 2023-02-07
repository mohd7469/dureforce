<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectStage extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title','module_id','is_active'];
    public static $Model_Name_Space = "App\Models\ProjectStage";
    public static $Redis_key = "project_stages";

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
