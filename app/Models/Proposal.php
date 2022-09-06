<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->morphTo();
    }
    public function delivery_mode()
    {
        return $this->belongsTo(DeliveryMode::class, 'delivery_mode_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
