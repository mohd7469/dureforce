<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileExperienceRequest extends FormRequest
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
            'job_title.*' => 'required|string|max:50',
            'job_description.*' => 'required|string',
            'company.*' => 'required|string|max:65',
            'job_location.*' => 'required',
            'start_date_job.*' => 'required',
            'end_date_job.*' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'start_date_job.*.required' => 'Start Date is required.',
            'end_date_job.*.required' => 'End Date is required.',
            'company.*.required' => 'Company is required.',
            'job_description.*.required' => 'Description is required',
            'job_title.*.required' => 'Job title is required',
            'job_location.*.required' => 'Please fill job location'
        ];
    }
}
