<?php

namespace App\Models;

use App\Traits\DatabaseOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DayPlanning extends Model
{
    use HasFactory,SoftDeletes,DatabaseOperations;
    protected $guarded = ['id'];

    public const STATUSES = [

        'ApprovalNotYet_Requested'  =>  40,
        'ApprovalRequested' =>  41,
        'ResendForApproval' =>  42,
        'Approved' =>  43,
        'Rejected' =>  44

    ];

    protected static function boot()
    {
        
        parent::boot();
        static::creating(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
        });

    }

    public static function scopeWithAll($query){
        return $query->with('client')->with('user')->with('status')->with('job')->with('offer')->with('contract')->with('tasks');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by')->withAll();
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id')->withAll();
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

    public function tasks()
    {
        return $this->hasMany(DayPlanningTask::class, 'day_planning_id');
    }
}
