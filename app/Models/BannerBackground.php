<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerBackground extends Model
{
    use HasFactory, SoftDeletes;
    const BACKGROUND_TYPES = [
        'BACKGROUND'       =>  'Background',
        'TECHNOLOGY_LOGO'  =>  'Technology Logo',
        'LEAD_IMAGE'       =>  'Leading Image',
    ];
    
    public function scopeBackground($query){
        return $query->where('document_type',self::BACKGROUND_TYPES['BACKGROUND']);
    }
    
    public function scopeLogos($query){
        return $query->where('document_type',self::BACKGROUND_TYPES['TECHNOLOGY_LOGO']);
    }


    public function scopeLeadImages($query){
        return $query->where('document_type',self::BACKGROUND_TYPES['LEAD_IMAGE']);
    }
}

