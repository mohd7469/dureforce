<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use App\Models\WorldLanguage;
use App\Rules\PhoneNumberValidate;
use App\Models\UserEducation;
use App\Models\UserExperiences;
use App\Models\UserBasic;
use App\Models\Category;
use App\Models\Country;
use App\Models\Degree;
use App\Models\LanguageLevel;
use App\Models\Skills;
use App\Models\UserSkill;
use Khsing\World\Models\Country as ModelsCountry;
use App\Models\User;
use Khsing\World\Models\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use PhpParser\Node\Stmt\TryCatch;
class ServiceController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $services = Service::where($this->applyFilters($request))
        ->with(['user', 'user.basicProfile','category', 'subCategory' ])
            ->orderBy('created_at','desc');
        $draftServices = Service::where($this->applyFilters($request))
        ->with(['user', 'user.basicProfile','category', 'subCategory' ])
            ->orderBy('created_at','desc');
        if (getLastLoginRoleId() == Role::$Freelancer){
            $services = $services->where('user_id', auth()->user()->id);
            $draftServices = $draftServices->where('user_id', auth()->user()->id)->where('status_id',Service::STATUSES['DRAFT']);
        }
        else{
            $services = $services->where('status_id', Service::STATUSES['APPROVED'])->orderBy('id','desc');
            $draftServices = $draftServices->where('status_id', Service::STATUSES['DRAFT']);
        }
        $services = $services->paginate(10)->withQueryString();
        $totalServices = $services->count();
        $draftServices = $draftServices->paginate(getPaginate())->withQueryString();
        $totalDraftServices = $draftServices->count();
        $pageTitle = "Service";
        $emptyMessage = "No data found";

        if (getLastLoginRoleId() == Role::$Freelancer){
            return view($this->activeTemplate . 'services.service-list', compact('pageTitle', 'services', 'emptyMessage','draftServices','totalServices','totalDraftServices'));

        }
        else{
             return view($this->activeTemplate . 'services.listing', compact('pageTitle', 'services', 'emptyMessage','draftServices'));
        }

    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function featured(Request $request)
    {
        $services = Service::Active()->Featured()->whereIn('status_id',[Service::STATUSES['APPROVED'],Service::STATUSES['FEATURED']])->with(['user', 'user.basicProfile', 'tags' ])->paginate(getPaginate());
        $pageTitle = "Service";
        $emptyMessage = "No data found";
        return view($this->activeTemplate . 'services.listing', compact('pageTitle', 'services', 'emptyMessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUserProfile($id = null)
{
 
        $pageTitle = 'Seller Profile';

        // Retrieve the user by ID. No authentication check, as this is for public access.
        $user = User::withAll()->where('id', $id)->firstOrFail();

        // Retrieve necessary data
        $skills = Skills::select('id', 'name')->get();
        $userskills = $user->skills;
        $basicProfile = $user->basicProfile;
        $user_languages = $user->languages;
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->get();
        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels = LanguageLevel::select('id', 'name')->get();
        $countries = Country::select('id', 'name')->get();
        $user_experience = $user->experiences;
        $user_education = $user->education;
        $user_portfolios = $user->portfolios;
        $categories = Category::select('id', 'name')->get();
        $degrees = Degree::select('id', 'title')->get();

        // Check user role to retrieve testimonials
        if (getLastLoginRoleId() == Role::$Freelancer) {
            $testimonials = $user->testimonials;
        } else {
            $testimonials = $user->testimonials()->Approved();
        }

        // Return the view with the gathered data
        return view($this->activeTemplate . 'user.seller.seller_profile', compact(
            'pageTitle', 
            'userskills', 
            'degrees', 
            'countries', 
            'language_levels', 
            'languages', 
            'skills', 
            'user', 
            'user_experience', 
            'user_education', 
            'user_portfolios', 
            'categories', 
            'basicProfile', 
            'cities', 
            'user_languages', 
            'testimonials'
        ));
   
    //    Log::error("Error in getUserProfile: ", [$th->getMessage()]);
        return redirect()->back()->with('error', 'Unable to load profile.');
    
}

}
