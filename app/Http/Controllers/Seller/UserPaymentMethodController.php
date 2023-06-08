<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCompany;
use App\Models\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd("dfdsf");
        $request->validate([
            'card_number'     => 'required|numeric|digits_between:13,19',
            'expiration_date' => 'required|date|after_or_equal:now',
            'cvv_code'        => 'required|numeric|digits_between:3,4',
            'name_on_card'    => 'required',
            'country'         => 'required',
            'city'            => 'required',
            'street_address'  => 'required',
        ],[
            'card_number.required'     => 'Card Number is required',
            'expiration_date.required' => 'Expiration Date is required',
            'cvv_code.required'        => 'CVV Code is required',
            'name_on_card.required'    => 'Name on Card is required',
            'street_address.required'  => 'Street Address is required'
        ]);

        $userPayment = new UserPayment();

        if(! empty($request->payment_id)) {
            $userPayment = UserPayment::findOrFail($request->payment_id);
            $userPayment->delete();
        }

        $userPayment->user_id = auth()->id();
        $userPayment->fill($request->except(['_token']))->save();
        $notify[] = ['success', 'Successfully Updated Profile.'];
        
        return redirect()->route('user.basic.profile', ['view' => 'step-3'])->withNotify($notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //
        $userPayment = UserPayment::findOrFail($id);
        $userPayment->delete();
        $notify[] = ['success', 'Your Payment Method is Deleted.'];
        return redirect()->route('user.basic.profile', ['view' => 'step-3'])->withNotify($notify);
    }

   
    
    

    public function changeStatus($id)
    {
        // dd($id);
        $all_methods = UserPayment::where('user_id',auth()->user()->id)->get();
        foreach($all_methods as $all_method){
            $all_method->is_primary = 0;
            $all_method->save();
        }
        $userPayment = UserPayment::findOrFail($id);

        $userPayment->update([
            'is_active' => UserPayment::ACTIVE,
            'is_primary' => UserPayment::ISPRIMARY
        ]);

        $notify[] = ['success', 'Your Payment Method is now changed.'];
        
        return redirect()->back()->withNotify($notify);
        // return redirect()->route('user.basic.profile', ['view' => 'step-3'])->withNotify($notify);
    }
}
