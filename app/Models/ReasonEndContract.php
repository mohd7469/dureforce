<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReasonEndContract extends BaseModel
{
    use HasFactory, SoftDeletes;

    public static $Model_Name_Space = "App\Models\ReasonEndContract";
    public static $Redis_key = "reason_end_contracts";
    public static $Is_Active = 1;

    protected $fillable = [
        'name','slug','is_active','role_id'
    ];


}
