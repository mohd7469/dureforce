<?php

namespace App\Models;

use App\Models\Software\Software;
use App\Notifications\CustomEmailVerification;
use App\Traits\DatabaseOperations;
use Cache;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens, HasFactory, HasRoles, DatabaseOperations;

    const FREELANCER = 1;
    const PROJECT_MANAGER = 2;
    const BOTH = 3;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'address'           => 'object',
        'type'              => 'integer',
        'ver_code_send_at'  => 'datetime',

    ];

    protected $data = [
        'data' => 1
    ];

    public static function scopeWithAll($query){

        return $query->with('categories')->with('languages')->with('basicProfile')->with('experiences')->with('education')->with('skills')->with('portfolios');

    }

    public static function scopeWithBuyerAll($query){

        return $query->with('company')->with('basicProfile')->with('payments')->with('languages');

    }

    public function basicProfile()
    {
        return $this->hasOne('App\Models\UserBasic');
    }

    public function login_logs()
    {
        return $this->hasMany(UserLogin::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('id', 'desc');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class)->where('status', '!=', 0);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class)->where('status', '!=', 0);
    }

    public function services()
    {
        return $this->hasMany(Service::class)->where('status', 1);
    }

    public function softwares()
    {
        return $this->hasMany(Software::class)->where('status', 1);
    }

    public function portfolios()
    {
        return $this->hasMany(UserPortFolio::class);
       
    }
    public function jobs()
    {
        // return $this->hasMany(Job::class)->where('status', 1);
        return $this->hasMany(Job::class);
    }
    public function proposal_attachment()
    {
        return $this->hasMany(ProposalAttachment::class)->where('status', 1);
    }
    public function proposal()
    {
        return $this->hasMany(Proposal::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skills::class,'user_skills','user_id','skill_id');
    }

    public function education()
    {
        return $this->hasMany('App\Models\UserEducation');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\UserExperiences')->with('country');
    }

    public function languages()
    {
        return $this->hasMany('App\Models\UserLanguage');
    }

    public function rate()
    {
        return $this->hasOne('App\Models\UserRate');
    }

    public function milestone()
    {
        return $this->hasMany(Milestone::class);
    }

    public function company()
    {
        return $this->hasOne('App\Models\UserCompany');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','user_categories');
    }
    public function payments()
    {
        return $this->hasMany('App\Models\UserPayment');
    }

    // SCOPES
    
    /**
     * getFullnameAttribute
     *
     * @return void
     */
    public function getFullnameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    /**
     * getJobTitleAttribute
     *
     * @return void
     */
    public function getJobTitleAttribute()
    {
        return $this->basicProfile->designation;
    }
    
    /**
     * getLocationAttribute
     *
     * @return void
     */
    // public function getLocationAttribute()
    // {
    //     return $this->country->name.', '.$this->basicProfile->city->name;
    // }
    public function getLocationAttribute()
    {
        $location=null;
        if(!empty($this->basicProfile->city->name))
        {
            $location .=$this->basicProfile->city->name.', ';
        }
        if(!empty($this->country->name)){
            $location.=$this->country->name;
        }
        return $location;
    }
    
    /**
     * getCountryAttribute
     *
     * @return void
     */
    public function getCountryNameAttribute()
    {
        return $this->country->name;
    }

    // public function scopeActive()
    // {
    //     return $this->where('status', 1);
    // }

    // public function scopeBanned()
    // {
    //     return $this->where('status', 0);
    // }

    public function scopeEmailUnverified()
    {
        return $this->where('email_verified_at', null);
    }

    // public function scopeSmsUnverified()
    // {
    //     return $this->where('sv', 0);
    // }

    public function scopeEmailVerified()
    {
        return $this->where('email_verified_at','!=', null);
    }

    // public function scopeSmsVerified()
    // {
    //     return $this->where('sv', 1);
    // }

    public function rank()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online' . $this->id);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    public function socials()
    {
        return $this->hasMany(UserSocial::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomEmailVerification);
    }

    public static function getAuthName(): string
    {
        if (Auth::check()) {
            $user = Auth::user();
            $firstName = $user->first_name;
            $lastname = $user->last_name;
            return "$firstName $lastname";
        }
    }

    public static function getLanguagesMoreThanOneCount($lenght = 0) : int
    {
        return auth()->user()->languages->count() > $lenght;
    }

    public static function getExperienceMoreThanOneCount($lenght = 0) : int
    {
        return auth()->user()->experiences->count() > $lenght;
    }

    public static function getSkillsMoreThanOneCount($lenght = 0) : int
    {
       return auth()->user()->skills->count() > $lenght;
    }

    public static function getEduationMoreThanOneCount($lenght = 0) : int
    {
        return auth()->user()->education->count() > $lenght;
    }
    
    public static function getPaymentMethodsMoreThanOneCount($lenght = 0) : int
    {
        return auth()->user()->payments->count() > $lenght;
    }

    public static function getRateMoreThanOneCount($lenght = 0) : int
    {
        $userRates = UserRate::where('user_id', auth()->id())->first();
        if(! empty($userRates)) {
           return auth()->user()->rate->count() > $lenght;
        } 

        return 0;
    }

    public static function getCompaniesMoreThanOneCount($lenght = 0) : int
    {
        $userCompany = UserCompany::where('user_id', auth()->id())->first();
        
        if(! empty($userCompany)) {
           return auth()->user()->company->count() > $lenght;
        } 

        return 0;
    }
    protected static function boot()
    {
        
        parent::boot();
        static::saving(function ($model)  {
            $uuid=Str::uuid()->toString();
            $model->uuid =  $uuid;
        });


    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function user_basic()
    {
        return $this->hasOne(UserBasic::class);

    }
    public function invitations()
    {
        return $this->hasMany(InviteFreelancer::class);
    }
    public function save_job()
    {
        return $this->belongsToMany(Job::class, 'user_saved_jobs');
    }

    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class);
    }

}   
//