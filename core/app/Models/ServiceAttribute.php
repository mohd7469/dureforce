<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'attribute_id'
    ];
  
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
