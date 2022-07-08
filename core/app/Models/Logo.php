<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Razorpay\Api\Entity;

class Logo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category_id',
        'status'
    ];


    public function entity() {
        return $this->belongsToMany(EntityLogo::class, 'entity_logos', 'logo_id', 'type_id');
    }

}
