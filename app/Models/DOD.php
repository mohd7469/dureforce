<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DOD extends Model
{

    use HasFactory;
    protected $fillable = ['title','module_id'];
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
