<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['level', 'amount'];
    protected $table = "ranks";

    public function jobs()
    {
        return $this->hasMany(Job::class,'rank_id');
    }
}
