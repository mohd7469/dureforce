<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerBackground extends Model
{
    use HasFactory;
    const BACKGROUND_TYPES = [
        'BACKGROUND'       =>  'Background',
        'TECHNOLOGY_LOGO'  =>  'Technology Logo'
    ];
    
    public function scopeBackground($query){
        return $query->where('document_type',self::BACKGROUND_TYPES['BACKGROUND']);
    }
    
    public function scopeLogos($query){
        return $query->where('document_type',self::BACKGROUND_TYPES['TECHNOLOGY_LOGO']);
    }
}

