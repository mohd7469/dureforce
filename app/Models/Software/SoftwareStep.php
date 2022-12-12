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
        'description'
    ];

    public function software()
    {
        return $this->belongsTo(Software::class);
    }    
}
