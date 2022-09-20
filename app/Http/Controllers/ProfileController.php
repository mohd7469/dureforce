<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\WorldLanguage;
use Illuminate\Http\Request;
use Khsing\World\Models\Country as ModelsCountry;

class ProfileController extends Controller
{        
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    /**
     * profile
     *
     * @return void
     */
    public function profile()
    {
        $categories=Category::select('id','name')->get();
        $countries=ModelsCountry::select('id','name')->get();   
        $languages=WorldLanguage::select('id','iso_language_name')->get();
        return view($this->activeTemplate.'profile.signup_basic',compact('categories','countries','languages'));

    }

    public function getProfileData()
    {
        $languages=WorldLanguage::select('id','iso_language_name')->get();
        return response()->json(['languages' => $languages ]);
    }
}
