<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOnService extends Model
{
    use HasFactory;
    protected $table="ad_on_services";
    protected $guarded = ['id'];

}
