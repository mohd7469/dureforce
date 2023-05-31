<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deliverable extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'slug', 'module_id','is_active'];
    protected $table = "deliverables";

    public static $Model_Name_Space = "App\Models\Deliverable";
    public static $Redis_key = "deliverables";
    public static $Is_Active = 1;

    public function scopeOnlyJob($query)
    {
        return $query->where('module_id',Module::$Job);
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model)  {
            $model->slug = \Str::slug($model->name);
        });
         static::addGlobalScope(new ActiveScope);

    }
    
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function job()
    {
        return $this->belongsToMany(DOD::class, 'job_deliverables');
    }
}
