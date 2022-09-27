<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','bid_type','service_fees_id','delivery_mode_id','module_id','module_type','hourly_bid_rate','amount_receive','start_hour_limit','end_hour_limit','cover_letter','deleted_at','fixed_bid_amount','project_start_date','project_end_date'];

    public static $bid_type_milestone = 'milestone';
    public static $by_project = 'by_project';


    protected static function boot()
    {

        parent::boot();
        static::saving(function ($model) {
            $uuid = Str::uuid()->toString();
            $model->uuid = $uuid;
        });

    }
    public static function scopeWithAll($query){

        return $query->with('module')->with('user')->with('user.skills');
    }

    public function module()
    {
        return $this->morphTo();
    }
    public function delivery_mode()
    {
        return $this->belongsTo(DeliveryMode::class, 'delivery_mode_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->with('user_basic');
    }

    public function milestone()
    {
        return $this->hasMany(Milestone::class);
    }
    public function attachment()
    {
        return $this->hasMany(ProposalAttachment::class);
    }

}
