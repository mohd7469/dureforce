<?php

namespace App\Models;

use App\Observers\DayPlanningObserver;
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
        'Draft'            =>  40,
        'In_Progress'      =>  41,
        'AwaitingApproval' =>  42,
        'ResendForApproval'=>  43,
        'Approved'         =>  44,
        'Rejected'         =>  45,
        'Completed'        =>  46,
    ];

    protected static function boot()
    {
        
        parent::boot();
        static::observe(DayPlanningObserver::class);

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
        return $this->hasMany(DayPlanningTask::class, 'day_planning_id')->with('status');
    }

    public function scopeApprovalsNotYetRequested($query)
    {
        return $query->where('status_id',self::STATUSES['ApprovalNotYet_Requested']);
    }
    public function scopeApproved($query)
    {
        return $query->where('status_id',self::STATUSES['Approved']);
    }
}
