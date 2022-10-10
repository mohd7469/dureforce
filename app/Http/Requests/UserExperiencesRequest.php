<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserExperiencesRequest extends FormRequest
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
            'title' => 'required|max:255',
            'company' => 'required|max:255',
            'description', 'required',
            'isCurrent' => 'required',
            'location' => 'required',
            'start'  => 'required|date',
            'end'    => 'required|date|after:start',
        ];
    }
}
