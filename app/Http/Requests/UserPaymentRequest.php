<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'card_number' => 'required',
            'expiration_date' => 'required',
            'cvv_code' => 'required',
            'name_on_card' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street_address' => 'required',
            'street_address_two' => 'required', 
            'status' => 'required',
            'user_id' => 'required', 
        ];
    }
}
