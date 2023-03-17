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
        'In_Progress'  =>  34,
        'Terminated' =>  35,
        'Completed' =>  36
    ];
    
    public static function scopeWithAll($query){
        return $query->with('offer');
    }

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
        });

    }

    public function offer()
    {
        return $this->belongsTo(ModuleOffer::class, 'module_offer_id')->WithAll();
    }
}
