<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class proposalattachmentsRequest extends FormRequest
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
            'name '   => 'required|max:255',
            'uploaded_name' => 'required|max:255',
            'type' => 'required|max:255',
            'is_published' => 'required|max:255',
            'module_id'=> 'required',
            'module_type'=>'required',
            'user_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name .required'        => 'Please fill name',
            'uploaded_name.required'         =>  'uploaded name is required',
            'url.required'      => 'url is required',
            'type.required'      => 'Type is required',
            'is_published.required'       => 'is_active is required',
            'module_id.required'      => 'module id is required',
            'module_type.required'      => 'module type is required',
             'user_id.required'      => 'user id is required',
        ];
    }
}
