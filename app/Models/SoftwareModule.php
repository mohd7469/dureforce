<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareModule extends Model
{
    use HasFactory;

    protected $table  = 'software_module';
    protected $fillable = [
        'id',
        'software_id',
        'module_title',
        'module_description',
        'price',
        'estimated_lead_time'
    ];

    public  function software()
    {
        return $this->belongsTo(Software::class);
    }
}
