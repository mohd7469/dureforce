<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryMode extends Model
{
    use HasFactory;

    public function proposal()
    {
        return $this->hasMany(Proposal::class,'delivery_mode_id');
    }
    public function module()
    {
        return $this->morphTo();
    }
}
