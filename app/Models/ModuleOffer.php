<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ModuleOffer extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="module_offers";
    public static $EMAIL_TEMPLATE="offer_sent";
    protected $guarded = ['id'];


    public const  Fix_Payment_Offer_Type = [
        'BY_PROJECT' => 'by_project' ,
        'BY_MILESTONE' =>'by_milestone'  
    ];

    public const PAYMENT_TYPE = [
        'FIXED' => 'Fixed',
        'HOURLY' =>'Hourly'  
    ];


    public const NOTIFICATION = [
        "INVITATION_TITLE" => "You have received an offer for the job ",
        "INVITATION_URL" => "offer-detail/",
        "INVITATION_TYPE" => "offer",
    ];


    public const STATUSES = [
        
        'PENDING'  =>  11,
        'ACCEPTED' =>  12,
        'REJECTED' =>  13,
        'WITHDRAW' =>  14, 
        'CLOSED'   =>  15, 
        'EXPIRED'  =>  16, 

    ];


    protected static function boot()
    {
        
        parent::boot();
        static::creating(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
            $model->offer_send_by_id=auth()->user()->id;
            $model->status_id=self::STATUSES['PENDING'];
        });


    }

    public static function scopewithAll($query)
    {
        return $query->with('moduleMilestones')->with('proposal.user')->with('attachments')->with('module')->with('sendToUser')->with('sendbyUser')->with('status')->with('contract');
    }
    public function moduleMilestones()
    {
        return $this->hasMany(ModuleOfferMilestone::class, 'module_offer_id');
    }
    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }
    public function module()
    {
        return $this->morphTo('module')->with('category');
    }

    public function sendToUser()
    {
        return $this->belongsTo(User::class, 'offer_send_to_id')->with('basicProfile');
    }
    public function sendbyUser()
    {
        return $this->belongsTo(User::class, 'offer_send_by_id')->with('basicProfile');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');

    }
    public function contract()
    {
        return $this->hasone(Contract::class, 'module_offer_id');
    }
}
