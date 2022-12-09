<?php

namespace App\Models;

use App\Observers\ServiceObserver;
use App\Observers\TagsObserver;
use Database\Seeders\ModuleSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    const UPDATED_AT = null;
    const SERVICE_CREATION_IN_PROGRESS = 0;
    const SERIVCE_CREATION_COMPLETED = 1;
    const FEATURED = 1;
    const NOT_FEATURED = 0;
    const ACTIVE = 1;
    const IN_ACTIVE = 0;
    const PENDING = 0;
    const APPROVED = 1;

    public const STATUSES = [
        'DRAFT'  =>  17,
        'PENDING'  =>  18,
        'APPROVED' =>  19,
        'CANCELLED' =>  20,
        'UNDER_REVIEW' =>  21
    ];

    protected $casts = [
        'tag' => 'object'
    ];

    protected $fillable = [
        'uuid',
        'user_id',
        'status_id',
        'category_id',
        'sub_category_id',
        'title',
        'description',
        'rate_per_hour',
        'estimated_delivery_time',
        'requirement_for_client',
        'number_of_simultaneous_projects',
        'is_terms_accepted',
        'is_privacy_accepted',
    ];

    public function scopeWithAll($query){
        $query->with('user')->with('serviceSteps')->with('category')->with('subCategory')->with('deliverable')->with('addOns')->with('status')->with('tags')->with('features')->with('skills');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function serviceSteps()
    {
        return $this->hasMany(ServiceProjectStep::class,'service_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function deliverable()
    {
        return $this->belongsToMany(Deliverable::class, 'service_deliverables');
    }

    public function addOns()
    {
        return $this->hasMany(AddOnService::class, 'service_id');
    }

    public function banner()
    {
        return $this->morphOne(ModuleBanner::class,'module');

    }
    public function reviewCount()
    {
        return $this->hasMany(ReviewRating::class, 'service_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'module','module_tags');
        
    }

    public function technologyLogos(){
        
        return $this->morphMany(BannerLogo::class,'module');
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
        return $query->where('status_id', self::FEATURED);
    }

    public function scopeNotFeatured($query)
    {
        return $query->where('status_id', self::NOT_FEATURED);
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->where('status_id', self::IN_ACTIVE);
    }

    public static function boot()
    {
        parent::boot();
        self::observe(TagsObserver::class);
        self::observe(ServiceObserver::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    public function documents()
    {
        return $this->morphMany(TaskDocument::class, 'module');
    }
    public function task_skill()
    {
        return $this->morphMany(TaskSkill::class, 'module_id');
    }
    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'service_skills','service_id','skills_id');
    }
    public function features()
    {
        return $this->morphToMany(Features::class, 'module','module_features');

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
