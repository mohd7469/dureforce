<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EntityField extends Model
{
    use HasFactory;


    const SOFTWARE = 1;
    const SERVICE  = 2;
    const JOB      = 3;

    protected $fillable = [
        'name',
        'type',
        'field_one',
        'field_two',
        'field_type',
        'attribute_type',
        'status'
    ];

    /**
     * Get all of the attributes for the EntityField
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    public function scopeEntity($query, $val) {
        return $query->where('type', $val);
    }
}
