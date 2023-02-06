<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','is_active'];

    public static function getDefault(int $limit = 8)
    {
        return self::limit($limit)->get();
    }



    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }
}
