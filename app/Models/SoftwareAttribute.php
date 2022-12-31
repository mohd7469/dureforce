<?php

namespace App\Models;

use App\Models\Software\Software;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareAttribute extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'software_id',
        'attribute_id'
    ];
  
    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
