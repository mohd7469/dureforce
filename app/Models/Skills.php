<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $name
 * @property UserSkill[] $userSkills
 */
class Skills extends Model
{
    use HasFactory,SoftDeletes;
    protected $hidden = ['created_at','updated_at','deleted_at'];
    protected $table="skills";

    public static $Model_Name_Space = "App\Models\Skills";
    public static $Redis_key = "categories";
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userSkills()
    {
        return $this->hasMany('App\models\UserSkill');
    }
    public function moduleSkill()
    {
        return $this->belongsTo(ModuleSkill::class, 'skill_id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attributes');
    }
    public function sub_categoires()
    {
        return $this->belongsToMany(SubCategory::class, 'category_attributes');
    }
    public function skill_categories()
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }
    public function task_skill()
    {
        return $this->morphMany(TaskSkill::class, 'task_skill');
    }
    public function job()
    {
        return $this->belongsToMany(Job::class, 'task_skills');
    }
}
