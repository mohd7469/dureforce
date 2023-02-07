<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAttributes extends Model
{
    use HasFactory;

    protected $table = 'sub_attributes';
    const SERVICE  = 1;
    const SOFTWARE = 2;
    const JOB      = 3;

    
    const BACKEND = 0;
    const FRONTEND = 1;
    const DEVELOPMENT = 'Development';
    const PROGRAMMING = 'Programming';
    const CODING_COMPETENCE = 'Coding Competence';
    const DATABASE = 'Database';
    const ACTIVE = 1;
    const IN_ACTIVE = 0;

    public function scopeActive($query)
    {
        $query->where('status', self::ACTIVE);
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function skillCategory()
    {
        return $this->belongsTo(skillCategory::class, 'skill_category_id');
    }
}
