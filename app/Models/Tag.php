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
