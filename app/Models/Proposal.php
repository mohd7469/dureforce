<?php

namespace App\Models;

use App\Traits\DatabaseOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Proposal extends Model
{
    use HasFactory , DatabaseOperations , SoftDeletes;
    protected $fillable = ['user_id','bid_type','status_id','service_fees_id','delivery_mode_id','module_id','module_type','hourly_bid_rate','amount_receive','start_hour_limit','end_hour_limit','is_shortlisted','cover_letter','deleted_at','fixed_bid_amount','project_start_date','project_end_date'];

    public static $bid_type_milestone = 'milestone';
    public static $by_project = 'by_project';


    public const STATUSES = [
        'SUBMITTED'  =>  29,
        'ARCHIVED'  =>  30,
        'ACTIVE'  =>  31,
    ];

    protected static function boot()
    {

        parent::boot();
        static::creating(function ($model) {
            $uuid = Str::uuid()->toString();
            $model->uuid = $uuid;
            $model->updated_at = Carbon::now();
        });

        static::updating(function ($model) {
            $model->updated_at = Carbon::now();
        });
    }
    public static function scopeWithAll($query){

        return $query->with('module')->with('user.portfolios.attachments')->with('user.skills')->with('user.languages')->with('user.education')->with('attachment');
    }
    public function scopeIsShortlisted($query)
    {
        return $query->where('is_shortlisted',true);
    }
    public function scopeIsNotShortlisted($query)
    {
        return $query->where('is_shortlisted',false);
    }
    public function module()
    {
        return $this->morphTo('module')->withTrashed();
    }
    public function delivery_mode()
    {
        return $this->belongsTo(DeliveryMode::class, 'delivery_mode_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->with('user_basic');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'module_id');
    }


    public function milestone()
    {
        return $this->hasMany(Milestone::class);
    }
    public function attachment()
    {
        return $this->hasMany(ProposalAttachment::class);
    }

    public function offer()
    {
        return $this->hasOne(ModuleOffer::class,'proposal_id');
    }

}
