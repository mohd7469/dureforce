<?php

namespace App\Models;

use App\Observers\SoftwareObserver;
use App\Observers\TagsObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    const UPDATED_AT = null;
    const FEATURED = 1;
    const NOT_FEATURED = 0;
    const ACTIVE = 1;
    const IN_ACTIVE = 0;

    protected $casts = [
        'tag' => 'object',
        'file_include' => 'object'
    ];

    protected $fillable = [
        'title',
        'featured',
        'user_id',
        'amount',
        'image',
        'favorite',
        'rating',
        'likes',
        'dislike',
        'delivery_time',
        'lead_image',
        'tag',
        'description',
        'banner_detail',
        'banner_heading',
        'status',
        'category_id',
        'sub_category_id',
        'creation_status',
        'demo_url',
        'document_file',
        'upload_software',
        'technology_logos',
        'file_include',
        'deliverables'
    ];

    public function featuresSoftware()
    {
        return $this->belongsToMany(Features::class, 'features_software', 'software_id', 'features_id');
    }

    public function softwareAttributes()
    {
        return $this->hasMany(SoftwareAttribute::class, 'software_id');
    }

    public function softwareDetail()
    {
        return $this->hasOne(SoftwareDetail::class);
    }

    public function softwareSteps()
    {
        return $this->hasMany(SoftwareStep::class, 'software_id');
    }
    
    public function extraSoftware()
    {
        return $this->hasMany(ExtraSoftware::class, 'software_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->where('status', Category::ACTIVE);
    }


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, TagsAssociate::class, 'model_id', 'id');
    }

    public function optionalImage()
    {
        return $this->hasMany(OptionalImage::class, 'software_id');
    }

    public function logos()
    {
        return $this->hasMany(EntityLogo::class, 'type_id');
    }

    public function reviewCount()
    {
        return $this->hasMany(ReviewRating::class, 'software_id');
    }

    public static function boot()
    {
        parent::boot();
        self::observe(TagsObserver::class);
        self::observe(SoftwareObserver::class);
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
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    public function task_document()
    {
        return $this->morphMany(TaskDocument::class, 'module_id');
    }
    public function documents()
    {
        return $this->morphMany(TaskDocument::class, 'module');
    }
    public function proposal()
    {
        return $this->morphMany(Proposal::class, 'module');
    }
    public function proposal_document()
    {
        return $this->morphMany(ProposalAttachment::class, 'module');
    }

    public function milestone()
    {
        return $this->morphMany(Milestone::class, 'module');
    }
    public function delivery_mode()
    {
        return $this->morphMany(DeliveryMode::class, 'module');
    }
}
