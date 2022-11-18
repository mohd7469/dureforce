<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleOffer extends Model
{
    use HasFactory;
    protected $table="module_offers";
    protected $guarded = [];


    public const  Fix_Payment_Offer_Type = [
        'BY_PROJECT' => 'by_project' ,
        'BY_MILESTONE' =>'by_milestone'  
    ];

    public const PAYMENT_TYPE = [
        'FIXED' => 'Fixed',
        'HOURLY' =>'Hourly'  
    ];
    public function moduleMilestones()
    {
        return $this->hasMany(ModuleOfferMilestone::class, 'module_offer_id');
    }
    public function moduleOffer()
    {
        return $this->belongsTo(Job::class);
    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }

}
