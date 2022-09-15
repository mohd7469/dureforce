<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEducationRequest extends FormRequest
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
            'user_id' => 'required',
            'institute_name' => 'required|max:255',
            'degree' => 'required',
            'degree_id', 'required',
            'description' => 'required',
            'field' => 'required',
            'field_id' => 'required',
            'isCurrent' => 'required',
            'start'  => 'required|date',
            'end'    => 'required|date|after:start',
          
        ];
    }
}
