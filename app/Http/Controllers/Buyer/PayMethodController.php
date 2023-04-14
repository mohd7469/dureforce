<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Skills;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserBasic;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPayment;
use App\Rules\PhoneNumberValidate;
use Illuminate\Support\Facades\DB as FacadesDB;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;


use Illuminate\Support\Facades\Validator;
use Khsing\World\Models\City;

class PayMethodController extends Controller
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
     * saveCompany
     *
     * @param mixed $request
     * @return void
     */


    /**
     * savePaymentMethod
     *
     * @param mixed $request
     * @return void
     */

    //  public function index()
    //  {
    //     return view($this->activeTemplate . 'buyer.payment-method.payment_list');
    //  }
      
    public function savePaymentMethod(Request $request)
    {
        $rules = [
            'card_number' => 'required|numeric|digits_between:13,19',
            'expiration_date' => 'required|date|after_or_equal:now',
            'cvv_code' => 'required|numeric|digits_between:3,4',
            'name_on_card' => 'required',
            'country_id' => 'required|exists:world_countries,id',
            'city_id' => 'required|exists:world_cities,id',
            'address' => 'required',
        ];

        $messages = [
            'card_number.required' => 'Card Number is required',
            'expiration_date.required' => 'Expiration Date is required',
            'cvv_code.required' => 'CVV Code is required',
            'name_on_card.required' => 'Name on Card is required',
            'street_address.required' => 'Street Address is required',
            'country_id' => 'Country is required',
            'city_id' => 'City is required',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        // $data = $request->validate($rules,$messages);
        if ($validator->fails()) {

            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();
                if ($request->update_payment_id) {


                    $userPayment = UserPayment::find($request->update_payment_id);

                    $userPayment->card_number = $request->card_number;
                    $userPayment->expiration_date = $request->expiration_date;
                    $userPayment->cvv_code = $request->cvv_code;
                    $userPayment->name_on_card = $request->name_on_card;
                    $userPayment->user_id = auth()->user()->id;
                    $userPayment->country_id = $request->country_id;
                    $userPayment->city_id = $request->city_id;
                    $userPayment->address = $request->address;
                    $userPayment->is_primary = 0;
                    $userPayment->is_active = 1;
                    $userPayment->save();
                    DB::commit();

                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' => route('buyer.payment_method_list')]);


                } else {
                    $userPayment = UserPayment::create([
                        'card_number' => $request->card_number,
                        'expiration_date' => $request->expiration_date,
                        'cvv_code' => $request->cvv_code,
                        'name_on_card' => $request->name_on_card,
                        'country_id' => $request->country_id,
                        'city_id' => $request->city_id,
                        'address' => $request->address,
                        'user_id' => auth()->user()->id,
                        'is_primary' => 0,
                        'is_active' => 1
                    ]);
                    DB::commit();
                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' =>  route('buyer.payment_method_list')]);

                }
                if (!empty($request->payment_id)) {
                    $userPayment = UserPayment::findOrFail($request->payment_id);
                    $userPayment->delete();
                }

            } catch (\Throwable $th) {

                DB::rollback();
                return response()->json(['error' => $th->getMessage()]);
                $notify[] = ['errors', 'Failled To Update User Payment Method .'];
                return back()->withNotify($notify);

            }
        }
    }

    /**
     * getUserProfile
     *
     * @return void
     */
    public function getUserProfile($module_offer_id = null)
    {
        $user = User::WithBuyerAll()->find(auth()->user()->id);
        $user_payment_methods = $user->payments;
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->orderBy('name', 'ASC')->get();
        $countries = Country::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view($this->activeTemplate . 'buyer.payment-method.payment_list', compact('countries', 'user', 'user_payment_methods', 'cities','module_offer_id'));

    }

    public function buyerstatuschange($id)
    {
        $all_methods = UserPayment::where('user_id',auth()->user()->id)->get();
        foreach($all_methods as $all_method){
            $all_method->is_primary = 0;
            $all_method->save();
        }
        $userPayment = UserPayment::findOrFail($id);
        $userPayment->is_primary = 1;
        $userPayment->save();
        $notify[] = ['success', 'Payment Method changed successfully.'];
        return redirect()->route('buyer.payment_method_list')->withNotify($notify);
    }

    public function buyerProfile($uuid='')
    {

        if($uuid){
            $user=User::where('uuid',$uuid)->first();
        }
        else{
            $user=auth()->user();
        }
        $skills = Skills::select('id', 'name')->get();
        $user = User::withAll()->find($user->id);
        $categories = Category::select('id', 'name')->get();
        $cities = City::select('id', 'name')->where('country_id', $user->country_id)->orderBy('name', 'ASC')->get();
        $countries = Country::select('id', 'name')->orderBy('name', 'ASC')->get();
        $languages = WorldLanguage::select('id', 'iso_language_name')->get();
        $language_levels = LanguageLevel::where('is_active',1)->select('id', 'name')->get();
        $degrees = Degree::where('is_active',1)->select('id', 'title')->get();
        $basicProfile = $user->basicProfile ? $user->basicProfile : new UserBasic();
        $userexperiences = $user->experiences ? $user->experiences : new UserExperiences();
        $usereducations = $user->education ? $user->education : new UserEducation();
        $userskills = $user->skills ? $user->skills : new UserSkill();
        $user_languages = $user->languages ? $user->languages : [];
        $user_v1languages = $user->v1languages ? $user->v1languages : collect([]);
        $user_v1ProficiencyLevels = $user->v1ProficiencyLevels ? $user->v1ProficiencyLevels : collect([]);


      
        $user_languages_ = WorldLanguage::whereIn('id', $user_languages->pluck('language_id')->toArray())->get();
        $user_languages_level_ = LanguageLevel::whereIn('id', $user_languages->pluck('language_level_id')->toArray())->get();
        $user_country_ = $user->company? Country::where('id', $user->company->country_id)->first():null;
        $user_loc_ = $user->company ? Country::where('id', $user->company->country_id)->first() : null;


        return view($this->activeTemplate . 'profile.buyer.signup_basic', compact('categories', 'user_loc_', 'cities', 'languages', 'language_levels', 'user', 'basicProfile', 'user_languages', 'countries', 'userexperiences', 'userskills', 'usereducations', 'skills', 'degrees', 'user_languages_', 'user_languages_level_', 'user_country_','user_v1languages','user_v1ProficiencyLevels'));
    }

    public function buyersavePaymentMethod(Request $request)
    {

        $rules = [
            'card_number' => 'required|numeric|digits_between:13,19',
            'expiration_date' => 'required|date|after_or_equal:now',
            'cvv_code' => 'required|numeric|digits_between:3,4',
            'name_on_card' => 'required',
            'country_id' => 'required|exists:world_countries,id',
            'city_id' => 'required|exists:world_cities,id',
            'address' => 'required',
        ];

        $messages = [
            'card_number.required' => 'Card Number is required',
            'expiration_date.required' => 'Expiration Date is required',
            'cvv_code.required' => 'CVV Code is required',
            'name_on_card.required' => 'Name on Card is required',
            'street_address.required' => 'Street Address is required',
            'country_id' => 'Country is required',
            'city_id' => 'City is required',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();
                if ($request->update_payment_id) {
                    $userPayment = UserPayment::find($request->update_payment_id);

                    $userPayment->card_number = $request->card_number;
                    $userPayment->expiration_date = $request->expiration_date;
                    $userPayment->cvv_code = $request->cvv_code;
                    $userPayment->name_on_card = $request->name_on_card;
                    $userPayment->country_id = $request->country_id;
                    $userPayment->city_id = $request->city_id;
                    $userPayment->address = $request->address;
                    $userPayment->user_id = auth()->user()->id;
                    $userPayment->is_primary = 1;
                    $userPayment->is_active = 1;
                    $userPayment->save();
                    DB::commit();

                    $notify[] = ['success', 'User Payment Method Updated Profile.'];


                    // return response()->json(['success'=> 'User Payment Method Updated Successfully','redirect_url' =>route('buyer.basic.profile',[ 'profile' => 'step-3'])]);
                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' => route('buyer.basic.profile', ['profile' => 'step-1'])]);

                    // return redirect()->route('buyer.basic.profile',[ 'profile' => 'step-1'])->withNotify($notify);


                } else {
                    $userPayment = UserPayment::create([
                        'card_number' => $request->card_number,
                        'expiration_date' => $request->expiration_date,
                        'cvv_code' => $request->cvv_code,
                        'name_on_card' => $request->name_on_card,
                        'country_id' => $request->country_id,
                        'city_id' => $request->city_id,
                        'address' => $request->address,
                        'user_id' => auth()->user()->id,
                        'is_primary' => 1,
                        'is_active' => 1
                    ]);

                    DB::commit();

                    return response()->json(['success' => 'User Payment Method Updated Successfully', 'redirect_url' => route('buyer.basic.profile', ['profile' => 'step-1'])]);

                }
                if (!empty($request->payment_id)) {
                    $userPayment = UserPayment::findOrFail($request->payment_id);
                    $userPayment->delete();
                }

            } catch (\Throwable $th) {

                DB::rollback();
                return response()->json(['error' => 'Failled To Update User Payment Method .']);

            }
        }
    }

    public function buyerdestroy($id)
    {
        $userPayment = UserPayment::findOrFail($id);
        $userPayment->delete();
        $notify[] = ['success', 'Your Payment Method is Deleted.'];
        return redirect()->route('buyer.payment_method_list')->withNotify($notify);
    }
  
    
}