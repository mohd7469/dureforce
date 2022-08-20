<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'module_id','slug'];
    protected $table = "deliverables";

    protected static function boot()
    {
        
        parent::boot();
        static::saving(function ($model)  {
            
            $model->slug = \Str::slug($model->name);
        });


    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function job()
    {
        return $this->belongsToMany(DOD::class, 'job_dods');
    }
}
