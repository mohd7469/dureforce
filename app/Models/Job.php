<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    public static $attachment_path = "attachments";
    protected $fillable = [

        "user_id",
        "job_type_id",
        "location_id",
        "category_id",
        "sub_category_id",
        "rank_id",
        "project_stage_id",
        "budget_type_id",
        "title",
        "description",
        "fixed_amount",
        "hourly_start_range",
        "hourly_end_range",
        "project_length_id",
        "expected_start_date",
        "status_id"

    ];
    

    const UPDATED_AT = null;
    

    protected static function boot()
    {
        
        parent::boot();
        static::saving(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
            $model->job_link = $uuid;
        });


    }
    public static function scopeWithAll($query){

        return $query->with('projectStage')->with('category')->with('status')->with('rank')->with('jobType')->with('budgetType')->with('dod')->with('deliverable')->with('skill')->with('subCategory')->with('documents');

    }

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
    public function project_length()
    {
    	return $this->belongsTo(ProjectLength::class, 'project_length_id');
    }

    public function dod()
    {
        return $this->belongsToMany(DOD::class, 'job_dods')->wherePivot('deleted_at', '=',null);
    }

    public function deliverable()
    {
        return $this->belongsToMany(Deliverable::class, 'job_deliverables')->wherePivot('deleted_at', '=',null);
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

    public function documents()
    {
        return $this->morphMany(TaskDocument::class, 'module');
    }

    public function task_skill()
    {
        return $this->morphMany(TaskSkill::class, 'task_skill');
    }

    public function skill()
    {
        return $this->belongsToMany(Skills::class, 'task_skills');
    }
    

    public function country(){

        return  $this->HasOne(Country::class, 'id', 'location_id');
    }


}
