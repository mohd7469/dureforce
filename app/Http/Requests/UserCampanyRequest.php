<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCampanyRequest extends FormRequest
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
                'name' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'phone' => 'required', 
                'email' => 'required|email|unique:users',
                'location' => 'required',
                'vat' => 'required', 
                'url' => 'required|url',
                'facebook_url' => 'required|url',
                'linkedin_url'  => 'required|url',
                'user_id'=> 'required',
                'title' => 'required|unique:user_companies|max:255',
                'body' => 'required',
        ];
    }
}
