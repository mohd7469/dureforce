<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerLogo extends Model
{
    use HasFactory;
    protected $guarded= ['id'];

    public function background(){
        return $this->belongsTo(BannerBackground::class,'banner_background_id', 'id');
    }
}
