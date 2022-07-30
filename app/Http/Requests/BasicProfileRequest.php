<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicProfileRequest extends FormRequest
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
            'designation'      => 'required|max:255',
            'about_me'         => 'sometimes',
            'location'         => 'sometimes',
            'languages.*'      => 'required',
            'language_level.*' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'about_me.sometimes'        => 'Please fill about me ',
            'languages.*.required'      => 'Language is required',
            'language_level.*.required' => 'Profiency Level is required'
        ];
    }
}
