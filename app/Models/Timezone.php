<?php

namespace App\Models;

use App\Traits\DatabaseOperations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timezone extends Model
{
    use HasFactory,SoftDeletes,DatabaseOperations;
    protected $fillables = ['id','name','created_at','updated_at','deleted_at'];
    

}
