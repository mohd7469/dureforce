<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityLogo extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'type_id',
        'logo_id'
    ];

  
    public function logos()
    {
        return $this->belongsTo(Logo::class);
    }
    
    public function services()
    {
        return $this->belongsTo(Service::class, 'type_id');
    }
}
