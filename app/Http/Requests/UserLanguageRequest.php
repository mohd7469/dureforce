<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLanguageRequest extends FormRequest
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
            'language_id' => 'required',
            'level' => 'required',
            'level_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
