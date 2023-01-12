<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\DatabaseOperations;
use Illuminate\Support\Str;

class ModuleProposal extends Model
{
    use HasFactory , DatabaseOperations , SoftDeletes;
    protected $fillable = ['user_id','bid_type','service_fees_id','delivery_mode_id','module_id','module_type','hourly_bid_rate','amount_receive','start_hour_limit','end_hour_limit','cover_letter','deleted_at','fixed_bid_amount','project_start_date','project_end_date'];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
        });
    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }
   
}
