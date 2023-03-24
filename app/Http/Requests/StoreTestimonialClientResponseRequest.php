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
            'client_response_full_name' => 'required',
            'client_response_role' => 'required',
            'client_response_company' => 'required',
            'client_response_linkedin_profile_url' => ['required','unique:user_testimonials,client_response_linkedin_profile_url',"regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
            'client_response' => 'required|max:500|min:100',
            'communication_rating' => 'required',
            'expertise_rating'  => 'required',
            'professionalism_rating' => 'required',
            'quality_rating'  => 'required'
        ];
    }
    public function messages()
    {
        return [
            'client_response_full_name.required' => 'full name field is required',
            'client_response_role.required' => 'role / designation  field is required',
            'client_response_company.required' => 'company field is required',
            'client_response_linkedin_profile_url.required' => 'linkedin profile url field is required',
            'client_response_linkedin_profile_url.unique'   => 'linkedin profile url filed should be unique',
            'client_response_linkedin_profile_url.regex'   => 'linkedin profile url format is invalid',
            
        ];
    }
}
