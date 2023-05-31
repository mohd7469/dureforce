<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProposalRequest extends FormRequest
{
    protected $redirect = "";

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->redirect =route('user.service.create', ['id' => $this->service_id, 'view' => 'step-4']);
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
            'delivery_mode_id' => 'required|exists:delivery_modes,id',
            'hourly_bid_rate' => 'required|numeric|min:1',
            'amount_receive' => 'required',
            'start_hour_limit' => 'required_with:end_hour_limit|numeric|min:1',
            'end_hour_limit' => 'required_with:start_hour_limit|numeric|gt:start_hour_limit',
            'cover_letter' => 'required|string|min:20'
        ];
    }

    public function messages()
    {
        return [
            'start_hour_limit.required_with' => 'Enter min hours field value or make empty max hours field',
            'end_hour_limit.required_with' => 'Enter max hours field value or make empty min hours field',
            'start_hour_limit.min' => 'Min hours field value must be greater than 0',
            'end_hour_limit.gt' => 'Max hours field value must be greater than min hours field',

        ];
    }
}
