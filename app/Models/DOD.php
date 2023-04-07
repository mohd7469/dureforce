<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DOD extends Model
{

    use HasFactory;
    protected $fillable = ['title','module_id','is_active'];

    public static $Model_Name_Space = "App\Models\DOD";
    public static $Redis_key = "dods";
    public static $Is_Active = 1;
    
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope);
    }

    public function scopeOnlyJob($query)
    {
        return $query->where('module_id',Module::$Job);
    }
    public function job()
    {
        return $this->belongsToMany(Job::class, 'job_dods');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

}
