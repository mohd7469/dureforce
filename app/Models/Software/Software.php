<?php

namespace App\Models\Software;

use App\Models\BannerLogo;
use App\Models\Category;
use App\Models\ChatMessage;
use App\Models\Deliverable;
use App\Models\DeliveryMode;
use App\Models\EntityLogo;
use App\Models\ExtraSoftware;
use App\Models\Features;
use App\Models\Milestone;
use App\Models\ModuleBanner;
use App\Models\ModuleChatUser;
use App\Models\OptionalImage;
use App\Models\Proposal;
use App\Models\ProposalAttachment;
use App\Models\Review;
use App\Models\ReviewRating;
use App\Models\SoftwareAttribute;
use App\Models\SoftwareDetail;
use App\Models\SoftwareProvidingStep;
use App\Models\Status;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\TagsAssociate;
use App\Models\TaskDocument;
use App\Models\User;
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

    public const STATUSES = [
        'DRAFT'     =>     22,
        'PENDING'   =>     23,
        'APPROVED'  =>     24,
        'CANCELLED' =>     25,
        'UNDER_REVIEW' =>  26,
        'FEATURED' =>  27
    ];

    protected $table = "softwares";
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
        'software_application',
        'description',
        'price',
        'estimated_lead_time',
        'requirement_for_client',
        'number_of_simultaneous_projects',
        'is_terms_accepted',
        'is_privacy_accepted',
    ];

    public function scopeWithAll($query){
        $query->with('user')->with('softwareSteps')->with('category')->with('subCategory')->with('status')->with('tags')->with('features');
    }

    public function deliverable()
    {
        return $this->belongsToMany(Deliverable::class, 'software_deliverables');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function features()
    {
        return $this->morphToMany(Features::class, 'module','module_features');

    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
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


    public function scopeActive($query)
    {
        return $query->where('is_active', self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->where('status', self::IN_ACTIVE);
    }

    public function softwareSteps()
    {
        return $this->hasMany(SoftwareProvidingStep::class,'software_id');
    }
    

    public function modules()
    {
        return $this->hasMany(SoftwareStep::class, 'software_id');
    }

    public function banner()
    {
        return $this->morphOne(ModuleBanner::class,'module')->with('background');
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
        return $this->morphMany(BannerLogo::class,'module')->with('background');
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
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', self::FEATURED);
    }
    public function scopeStatus($query,$status_id)
    {
        return $query->where('status_id', $status_id);
    }

    public function scopePublicFeatured($query)
    {
        return $query->whereNotIn('status_id', [self::STATUSES['FEATURED']]);
    }

    public function messages()
    {
        return $this->morphMany(ChatMessage::class, 'module')->with('user');
    }

    public function chatUsers()
    {
        return $this->morphMany(ModuleChatUser::class, 'module');
    }
}
