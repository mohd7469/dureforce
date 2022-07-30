<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraService extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'price',
        'delivery'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
}
