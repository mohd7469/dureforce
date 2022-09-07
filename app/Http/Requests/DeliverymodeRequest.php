<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliverymodeRequest extends FormRequest
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
            'module_id'=> 'required',
            'module_type'=>'required',
            'is_active'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'title.required'        => 'Please fill title',
            'slug.required'         =>  'slug is required',
            'module_id.required'      => 'module_id is required',
            'module_type.required'      => 'module_type is required',
            'is_active.required'       => 'is_active is required',
        ];
    }
}
