<?php

namespace App\Models;

use App\Observers\ServiceObserver;
use App\Observers\TagsObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    const UPDATED_AT = null;
    const SERVICE_CREATION_IN_PROGRESS = 0;
    const SERIVCE_CREATION_COMPLETED = 1;
    const FEATURED = 1;
    const NOT_FEATURED = 0;
    const ACTIVE = 1;
    const IN_ACTIVE = 0;
    const PENDING = 0;
    const APPROVED = 1;

    protected $casts = [
        'tag' => 'object'
    ];

    protected $fillable = [
        'title',
        'featured',
        'user_id',
        'price',
        'image',
        'favorite',
        'rating',
        'likes',
        'dislike',
        'delivery_time',
        'tag',
        'description',
        'banner_detail',
        'banner_heading',
        'lead_image',
        'status',
        'category_id',
        'sub_category_id',
        'technology_logos',
        'creation_status',
        'deliverables'
    ];

    public function featuresService()
    {
        return $this->belongsToMany(Features::class, 'features_services', 'service_id', 'features_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function serviceAttributes()
    {
        return $this->hasMany(ServiceAttribute::class, 'service_id');
    }

    public function serviceDetail()
    {
        return $this->hasOne(ServiceDetail::class);
    }

    public function serviceSteps()
    {
        return $this->hasMany(ServiceStep::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->where('status', Category::ACTIVE);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function extraService()
    {
        return $this->hasMany(ExtraService::class, 'service_id');
    }

    public function optionalImage()
    {
        return $this->hasMany(OptionalImage::class, 'service_id');
    }


    public function reviewCount()
    {
        return $this->hasMany(ReviewRating::class, 'service_id');
    }

    public function tags()
    {
        return $this->hasMany(TagsAssociate::class, 'model_id');
    }

    public function logos()
    {
        $relation = $this->hasMany(EntityLogo::class, 'type_id');
        $relation->getQuery()->where('type', 'SERVICE');
        return $relation;
    }
    

    public function scopeUserServiceInProgress($query)
    {
        $query->where([
            'user_id' => auth()->id(),
            'creation_status' => Service::SERVICE_CREATION_IN_PROGRESS
        ]);
    }

    public function scopeUserServiceCompleted($query)
    {
        $query->where([
            'user_id' => auth()->id(),
            'creation_status' => Service::SERIVCE_CREATION_COMPLETED
        ]);
    }


    public function scopeFeatured($query)
    {
        return $query->where('featured', self::FEATURED);
    }

    public function scopeNotFeatured($query)
    {
        return $query->where('featured', self::NOT_FEATURED);
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->where('status', self::IN_ACTIVE);
    }

    public function _decoded_deliverables()
    {
        return json_decode($this->deliverables);
    }


//    public function associatedTags()
//    {
//        return $this->belongsToMany('services', 'tags-associates', 'model_id', 'tag_id')
//            ->withPivot(['id', 'name']);
//    }

    public static function boot()
    {
        parent::boot();
        self::observe(TagsObserver::class);
        self::observe(ServiceObserver::class);
    }

//    public function withTags(){
//
//        'tags' => function (HasMany $builder) {
//            $builder->with(['tag' => function (BelongsTo $belongsTo) {
//                $belongsTo->select(['id', 'name']);
//            }]
//    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
