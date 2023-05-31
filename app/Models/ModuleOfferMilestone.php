<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleOfferMilestone extends Model
{
    use HasFactory;
    protected $guarded = [];  

    public const STATUSES = [
        'Pending'          =>  47,
        'In_Progress'      =>  48,
        'Completed'        =>  49,
        'Paid'             =>  50,
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model)  {
            $model->status_id =  self::STATUSES['Pending'];
        });
    }
    
    public function moduleMilestone()
    {
        return $this->belongsTo(ModuleOffer::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

}
