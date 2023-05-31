<?php

namespace App\Models;

use App\Traits\DatabaseOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class TaskComment extends Model
{
    use HasFactory,SoftDeletes,DatabaseOperations;
    protected $guarded = ['id'];

    protected static function boot()
    {
        
        parent::boot();
        static::creating(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
        });

    }
    public static function scopeWithAll($query){

        return $query->with('user')->with('contractTask');

    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by')->withAll();
    }

    public function contractTask()
    {
        return $this->belongsTo(DayPlanningTask::class, 'contract_task_id')->withAll();
    }


}

