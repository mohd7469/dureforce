<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraSoftware extends Model
{
    use HasFactory;

    protected $fillable = [
        'software_id',
        'title',
        'price',
        'delivery'
    ];

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

}
