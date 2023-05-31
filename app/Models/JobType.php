<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobType extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['title','module_id','is_active'];
    public static  $OneTime = 1;
    public static  $ONGoing = 2;

    public static $Model_Name_Space = "App\Models\JobType";
    public static $Redis_key = "job_types";
    public static $Is_Active = 1;

    public function scopeOnlyJob($query)
    {
        return $query->where('module_id',Module::$Job);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class,'job_type_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

}
