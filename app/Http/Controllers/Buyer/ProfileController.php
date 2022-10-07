<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\UserCompany;
use App\Models\UserPayment;
use App\Rules\PhoneNumberValidate;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;

use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    
   /**
     * saveCompany
     *
     * @param  mixed $request
     * @return void
     */
    public function saveCompany(Request $request)
    {
        $rules = [
            'email' => 'email',
            'phone' => ['required', new PhoneNumberValidate],
            'vat' => 'required|min:9'
          

        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } else {
            try {

                DB::beginTransaction();
                $user = User::findOrFail(auth()->id());
                $filename = '';

                if ($request->hasFile('company_logo')) {

                    $location = imagePath()['profile']['user']['path'];
                    $size = imagePath()['profile']['user']['size'];
                    $filename = uploadImage($request->company_logo, $location, $size, auth()->user()->image);
                }

                if(empty($filename)) {
                    $filename = $user->company->logo ?? '';
                }

                $user->company()->delete();

                $user->company()->save(new UserCompany([
                    'name'         => $request->get('name'),
                    'number'        => $request->get('phone'),
                    'logo'         => $filename,
                    'email'        => $request->get('email'),
                    'country_id'     => $request->get('country_id'),
                    'vat'          => $request->get('vat'),
                    'website'          => $request->get('url'),
                    'linked_url' => $request->get('linkedin_url'),
                    'facebook_url' => $request->get('facebook_url')
                ]));
                
                DB::commit();
                return response()->json(['success'=> 'User Company Updated Successfully']);

            } catch (\Throwable $th) {
                DB::rollback();
                return response()->json(['error' => $th->getMessage()]);
                $notify[] = ['errors', 'Failled To Save User Company .'];
                return back()->withNotify($notify);
                
            }
        }
    }
    
    /**
     * savePaymentMethod
     *
     * @param  mixed $request
     * @return void
     */
    public function savePaymentMethod(Request $request)
    {
        $rules = [
            'card_number' => ['required', new CardNumber],
            'expiration_date' => 'required',
            'cvv_code' => 'required',
            // 'cvv_code' => ['required', new CardCvc($this->get('cvv_code'))],
            'name_on_card'    => 'required',
            'country_id'         => 'required|exists:world_countries,id',
            'city_id'            => 'required|exists:world_cities,id',
            'address'  => 'required',
        ];

        $messages =[
            'card_number.required'     => 'Card Number is required',
            'expiration_date.required' => 'Expiration Date is required',
            'cvv_code.required'        => 'CVV Code is required',
            'name_on_card.required'    => 'Name on Card is required',
            'street_address.required'  => 'Street Address is required',
            'country_id'               => 'Country is required',
            'city_id'                  => 'City is required',

        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        } 
        else 
        {
            try {

                DB::beginTransaction();
                if(! empty($request->payment_id)) {
                    $userPayment = UserPayment::findOrFail($request->payment_id);
                    $userPayment->delete();
                }
                $userPayment=UserPayment::create([
                    'card_number' => $request->card_number,
                    'expiration_date'=>$request->expiration_date,
                    'cvv_code'=>$request->cvv_code,
                    'name_on_card'=>$request->name_on_card,
                    'country_id'=>$request->country_id,
                    'city_id'=>$request->city_id,
                    'address'=>$request->address,
                    'user_id'=>auth()->id(),
                    'is_primary' => 1,
                    'is_active'  =>1
                ]);
                DB::commit();

                return response()->json(['success'=> 'User Payment Method Updated Successfully','redirect_url' =>route('user.basic.profile',[ 'view' => 'step-3'])]);

            } catch (\Throwable $th) {

                DB::rollback();
                return response()->json(['error' => $th->getMessage()]);
                $notify[] = ['errors', 'Failled To Update User Payment Method .'];
                return back()->withNotify($notify);

            }
        }
    }


}
