<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory;

    protected $table = 'entity_attributes';

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

    protected $fillable = [
        'type',
        'title',
        'name',
        'status',
        'entity_field_id'
    ];

    protected $casts = [
        'type' => 'boolean',
        'status' => 'boolean'
    ];

    /**
     * Get the entityField that owns the Attribute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entityField()
    {
        return $this->belongsTo(EntityField::class, 'entity_field_id', 'id');
    }

    public function scopeActive($query)
    {
        $query->where('status', self::ACTIVE);
    }

    public function scopeBackend($query)
    {
        $query->where('type', self::BACKEND);
    }

    public function scopeFrontend($query)
    {
        $query->where('type', self::FRONTEND);
    }
}
