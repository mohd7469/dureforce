<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $company
 * @property string $description
 * @property boolean $isCurrent
 * @property string $start
 * @property string $end
 * @property User $user
 */
class UserExperiences extends Model
{
    const CURRENTLY_WORKING = 1;
    const NOT_WORKING = 0;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    
    protected $casts = [
        'end ' => 'datetime:Y-m-d',
        'start ' => 'datetime:Y-m-d',

      ];
      protected static function boot()
      {
          
          parent::boot();
          static::saving(function ($model)  {
              $model->is_working =   $model->is_working  == 'on' ? 1: 0;
          });
  
  
      }
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'job_title', 'company_name', 'description', 'is_working', 'country_id','start_date', 'end_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

}
