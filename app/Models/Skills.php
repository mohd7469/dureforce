<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property UserSkill[] $userSkills
 */
class Skills extends Model
{
    protected $hidden = ['pivot','created_at','updated_at','deleted_at'];
    protected $table="skills";
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
    public function skill_categories()
    {
        return $this->belongsToMany(SkillCategory::class, 'module_skills');
    }
    public function skill_sub_categories()
    {
        return $this->belongsToMany(SkillSubCategory::class, 'module_skills');
    }
}
