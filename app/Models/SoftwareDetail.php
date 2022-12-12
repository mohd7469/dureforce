<?php

namespace App\Models;

use App\Models\Software\Software;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'software_id',
        'entity_fields',
        'client_requirements',
        'max_no_projects',
        'copyright_notice',
        'privacy_notice'
    ];

    
    public function software()
    {
        return $this->belongsTo(Software::class);
    }


    public function getEntityFieldsAttribute($value) 
    {
        return decodeOrEncodeFields($value);
    }
}
