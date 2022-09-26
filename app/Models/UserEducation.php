<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $institute_name
 * @property string $degree
 * @property int $degree_id
 * @property string $description
 * @property string $field
 * @property int $field_id
 * @property boolean $isCurrent
 * @property string $start
 * @property string $end
 * @property User $user
 */
class UserEducation extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'user_education';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'school_name', 'degree_id', 'description', 'education', 'field_of_Study', 'is_enrolled', 'start_date', 'end_date'];


    protected static function boot()
    {
          
        parent::boot();
        static::saving(function ($model)  {
            $model->is_enrolled =   $model->is_enrolled  == 'on' ? 1: 0;
        });

    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
