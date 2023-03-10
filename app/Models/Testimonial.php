<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    public function testimonial_by()
    {
        return $this->belongsTo(User::class, 'testimonial_by');
    }
    public function testimonial_for()
    {
        return $this->belongsTo(User::class, 'testimonial_for');
    }
}
