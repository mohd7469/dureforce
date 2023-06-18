<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFee extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','fee','is_active','created_by','updated_by','module_id'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

}
