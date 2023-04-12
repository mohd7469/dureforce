<?php

namespace App\Models;

use App\Traits\DatabaseOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Contract extends Model
{
    use HasFactory,SoftDeletes , DatabaseOperations;
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $guarded = ['id'];

    public const STATUSES = [
        'In_Progress'  =>  33,
        'Terminated' =>  34,
        'Completed' =>  35
    ];


    public const NOTIFICATION = [
        "CONTRACT_TITLE" => "Your Contract ",
        "CONTRACT_URL" => "contract_detail/",
        "CONTRACT_TYPE" => "contract",
    ];
    public static function scopeWithAll($query){
        return $query->with('offer')->with('status');
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
            $model->contract_id=generateUniqueRandomNumber();
        });

    }

    public function offer()
    {
        return $this->belongsTo(ModuleOffer::class, 'module_offer_id')->WithAll();
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
