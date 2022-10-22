<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortFolio extends Model
{
    protected $table="user_portfolios";

    protected $fillable = [
        'user_id',
        'description',
        'project_url',
        'video_url',
        'name',
        'completion_date'
       
    ];
    public function skills()
    {
        return $this->belongsToMany(Skills::class,'portfolio_skills','user_portfolio_id','skill_id');
    }
    public function attachments(){
        return $this->morphMany(Attachment::class,'section');
    }
    use HasFactory;
}
