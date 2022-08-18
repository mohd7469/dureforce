<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $casts = [
        'skill' => 'object'
    ];

    const UPDATED_AT = null;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function projectStage()
    {
        return $this->belongsTo(ProjectStage::class, 'project_stage_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id')->where('status', Category::ACTIVE);
    }
    public function status()
    {
    	return $this->belongsTo(Status::class, 'status_id');
    }
    public function rank()
    {
    	return $this->belongsTo(Rank::class, 'rank_id');
    }
    public function jobType()
    {
    	return $this->belongsTo(JobType::class, 'job_type_id');
    }
    public function budgetType()
    {
    	return $this->belongsTo(BudgetType::class, 'budget_type_id');
    }

    public function dod()
    {
        return $this->belongsToMany(DOD::class, 'job_dods');
    }




    public function subCategory()
    {
    	return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }


    public function jobBiding()
    {
        return $this->hasMany(JobBiding::class, 'job_id');
    }


    public function commentCount()
    {
        return $this->hasMany(Comment::class, 'job_id');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    public function task_document()
    {
        return $this->morphMany(TaskDocument::class, 'module_id');
    }
    public function task_skill()
    {
        return $this->morphMany(TaskSkill::class, 'module_id');
    }


}
