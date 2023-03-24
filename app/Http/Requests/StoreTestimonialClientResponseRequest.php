<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialClientResponseRequest extends FormRequest
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
            'client_response' => 'required',
            'communication_rating' => 'required',
            'expertise_rating'  => 'required',
            'professionalism_rating' => 'required',
            'quality_rating'  => 'required'
        ];
    }
}
