<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;

    public static function getDefault(int $limit = 8)
    {
        return self::limit($limit)->get();
    }
}
