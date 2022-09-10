<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropsalStoreRequest extends FormRequest
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
            'delivery_mode_id ' => 'required|max:255',
            'module_id'  => 'required',
            'module_type'=>'required',
            'user_id'  => 'required',
            'hourly_bid_rate'=>'required',
             'service_fees_id'=>'required',
            'amount_receive'=>'required',
            'start_hour_limit'=>'required',
            'end_hour_limit'=>'required',
            'cover_letter'=>'required|max:255'

        ];
    }
    public function messages()
    {
        return [
            'delivery_mode_id.required'        => 'Please fill delivery mode id',
            'module_id'      => 'module_id is required',
            'user_id.required' => 'user_id is required',
            'hourly_bid_rate.required'=>'hourly_bid_rate is required',
            'service_fees_id.required'=>'service_fees_id is required',
            'amount_receive.required'=>'amount_receive is required ',
            'start_hour_limit.required'=>'start_hour_limit is required ',
            'end_hour_limit.required'=>'end_hour_limit is required ',
            'cover_letter.required'=>'cover_letter is required ',
        ];
    }
}
