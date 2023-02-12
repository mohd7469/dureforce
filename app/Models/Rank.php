<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use HasFactory;
    protected $fillable = ['level', 'amount'];
    protected $table = "ranks";
    public static $Model_Name_Space = "App\Models\Rank";
    public static $Redis_key = "experience_levels";
    public static $Is_Active = 1;

    public function jobs()
    {
        return $this->hasMany(Job::class,'rank_id');
    }
}
