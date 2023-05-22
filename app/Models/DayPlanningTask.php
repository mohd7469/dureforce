<?php

namespace App\Models;

use App\Traits\DatabaseOperations;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DayPlanningTask extends Model
{
    use HasFactory,SoftDeletes,DatabaseOperations;
    protected $guarded = ['id'];
    protected $appends = ['custom_description','custom_start_time','custom_end_time','custom_task_amount','custom_hours'];

    protected static function boot()
    {
        
        parent::boot();
        static::creating(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
        });

    }

    public static function scopeWithAll($query){
        return $query->with('client')->with('attachments')->with('user')->with('status')->with('job')->with('offer')->with('contract')->with('notes')->with('day');
    }

    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }
    public function getCustomStartTimeAttribute()
    {
        $time = new DateTime($this->attributes['start_time']);
        return $time->format('h:i A');
    }
    public function getCustomDescriptionAttribute()
    {
        return str_limit($this->attributes['description'], 25);
    }
    public function getCustomHoursAttribute()
    {
        return round(($this->attributes['time_in_hours']*60 + $this->attributes['time_in_minutes'])/60,2);
    }
    public function getCustomTaskAmountAttribute()
    {
        $user_rate_per_hours=$this->contract->offer->rate_per_hour;
        $task_amount = (($this->attributes['time_in_hours']*60) + $this->attributes['time_in_minutes']) * ($user_rate_per_hours/60) ; 
        return '$'.round($task_amount,2);
    }
    public function getCustomEndTimeAttribute()
    {
        $time = new DateTime($this->attributes['end_time']);
        return $time->format('h:i A');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by')->withAll();
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id')->withAll();
    }

    public function day()
    {
        return $this->belongsTo(DayPlanning::class, 'day_planning_id')->withAll();
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id')->withAll();
    }

    public function offer()
    {
        return $this->belongsTo(ModuleOffer::class, 'module_offer_id')->withAll();
    }
    
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id')->withAll();
    }
   
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function notes()
    {
        return $this->hasMany(TaskComment::class, 'day_planning_task_id');
    }
}
