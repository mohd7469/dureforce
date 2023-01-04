<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ModuleBanner extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = "module_banners";

    public static $Static  = 'Static'  ;
    public static $Dynamic = 'Dynamic' ;
    public static $Video   = 'Video'   ;
    
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
        });
        
        

    }
    public function module(){

    }

    public function background(){
        return $this->belongsTo(BannerBackground::class,'banner_background_id', 'id');
    }
    public function defaultLeadImage(){
        return $this->belongsTo(BannerBackground::class,'default_lead_image_id', 'id');
    }
    public function logos(){
        return $this->hasMany(BannerLogo::class,'module_banner_id', 'id');
    }
}
