<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property TagsAssociate[] $tagsAssociates
 */
class Tag extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    
    public const TAG_TYPE_SERVICE = 1;
    public const TAG_TYPE_SOFTWARE = 2;
    public const TAG_TYPE_BLOG = 3;
    protected $keyType = 'integer';

    protected $table="tags";

    public static $Model_Name_Space = "App\Models\Tag";
    public static $Redis_key = "tags";
    public static $Is_Active = 1;
    
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tagsAssociates()
    {
        return $this->hasMany('App\Models\TagsAssociate');
    }

    public static function defaultSelect()
    {
        return ["id", "name"];
    }


    public function scopeActive($query)
    {
        return $query->where('is_active',1);
    }

    public static function topTags(int $typeId)
    {
        return Tag::select(self::defaultSelect())->whereHas('tagsAssociates', function (Builder $builder) use ($typeId) {
            $builder->where('model_type', $typeId)
                ->groupBy('tag_id')
                ->orderByRaw("COUNT(*) DESC")
                ->limit(10);
        }) ->limit(25)->get();
    }

}
