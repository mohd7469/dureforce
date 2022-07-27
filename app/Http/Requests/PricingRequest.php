<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'price'         => 'required',
            'delivery_time' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'delivery_time' => 'Delivery Time is required'  
        ];
    }
}
