<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class servicefeesRequest extends FormRequest
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
            'title'   => 'required|max:255',
            'slug'    =>  'required',
            'fee'    =>  'required',
             'is_active'    =>  'required',
            'module_id'=>   'required',
            'created_by'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Please fill title',
            'slug.required' => 'slug is required',
            'fee.required' => 'fee is required',
            'module_id.required' => 'module id is required',
            'is_active.required' => 'is active is required',
            'created_by.required' => 'created by is required',
             'updated_by.required' => 'updated by is required',
        ];
    }
}
