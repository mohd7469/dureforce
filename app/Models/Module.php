<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'module_id'];
    protected $table = "modules";

    public static $Job	 = 1;
    public static $Service	 = 2;
    public static $Software	 = 3;


    public function projectStage()
    {
        return $this->hasMany(ProjectStage::class,'module_id');
    }
    public function deliverable()
    {
        return $this->hasMany(Deliverable::class,'module_id');
    }
    public function jobType()
    {
        return $this->hasMany(JobType::class,'module_id');
    }
    public function dod()
    {
        return $this->hasMany(DOD::class,'module_id');
    }
    public function budgetTypes()
    {
        return $this->hasMany(BudgetType::class,'module_id');
    }
    public function status()
    {
        return $this->hasMany(Status::class,'module_id');
    }
    public function moduleSkill()
    {
        return $this->belongsTo(ModuleSkill::class, 'module_id');
    }
}
