<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'entity_fields',
        'client_requirements',
        'database',
        'max_no_projects',
        'copyright_notice',
        'privacy_notice'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    
    public function getEntityFieldsAttribute($value) 
    {
        return decodeOrEncodeFields($value);
    }
}
