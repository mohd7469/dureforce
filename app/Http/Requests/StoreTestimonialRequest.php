<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class StoreTestimonialRequest extends FormRequest
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
            'client_name' => 'required',
            'client_email' => 'required|unique:user_testimonials,client_email',
            'client_linkedin_url' => ['required','unique:user_testimonials,client_linkedin_url',"regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"],
            'message_to_client' =>  'min:50| max:200',
        ];
    }
    public function messages()
    {
        return [
            'client_email.required' => 'business email address field is required',
            'client_email.unique'  => 'business email address field is must be unique',
            'client_linkedin_url.required' => 'client linkedin profile url filed is required',
            'client_linkedin_url.unique'   => 'client linkedin profile url filed should be unique',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
  
        $response = response()->json([
            'status' => 422,
            'errors' => $validator->errors()//$validator->errors()
        ]);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }

}
