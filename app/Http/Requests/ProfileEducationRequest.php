<?php

namespace App\Http\Requests;



class ProfileEducationRequest 
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
            'institute_name.*' => 'required|string|max:50',
            'degree.*' => 'required|string',
            'company.*' => 'required|string|max:65',
            'start_date_institute.*' => 'required',
            'end_date_institute.*' => 'required',
            'institute_description.*' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'institute_name.*.required' => 'Institute Name is required.',
            'degree.*.required' => 'Degree is required.',
            'field.*.required' => 'Field Of Study is required',
            'start_date_institute.*.required' => 'Start Date is required.',
            'end_date_institute.*.required' => 'End Date is required.',
            'institute_description.*.required' => 'Please fill the description'
        ];
    }
}
