<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'description'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }    
}
