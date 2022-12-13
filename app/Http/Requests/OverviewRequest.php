<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OverviewRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:sub_categories,id',
            'features' => 'required|array|exists:features,id',
            'tag' => 'required|array|exists:tags,id',
            'attrs.*' => 'required',
            'description' => 'required',
            'skills'=> 'required|array|exists:skills,id'
        ];
    }

    public function messages()
    {
        return [
            'attrs.*' => 'Attributes are required',
            'category_id' => 'Category is required',
            'subcategory_id' => 'Sub Category is required'
        ];
    }
}
