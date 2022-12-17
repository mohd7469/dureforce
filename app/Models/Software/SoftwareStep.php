<?php

namespace App\Models\Software;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'software_id',
        'name',
        'description',
        'start_price',
        'estimated_lead_time',
        'is_manual_title'
    ];

    public function software()
    {
        return $this->belongsTo(Software::class);
    }    
}
