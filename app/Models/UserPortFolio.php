<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortFolio extends Model
{
    protected $table="user_portfolios";

    protected $fillable = [
        'name',
        'completion_date'
       
    ];

    use HasFactory;
}
