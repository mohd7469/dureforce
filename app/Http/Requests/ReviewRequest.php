<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'max_no_projects' => 'required|integer|min:3|max:10'

        ];
    }

    public function messages()
    {
        return [
            'max_no_projects.required' => 'Maximum number of projects is required'
        ];
    }
}
