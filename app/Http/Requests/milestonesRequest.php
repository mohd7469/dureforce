<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class milestonesRequest extends FormRequest
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
              'description.*' => 'required|array|min:255',
              'start_date.*'   => 'required|array',
              'end_date.*'   => 'required|array',
              'amount.*'   => 'required|array',
              'completed'=> 'required',
              'user_id'=> 'required',
               'module_id'=> 'required',
               'module_type'=> 'required',
              'proposal_id'=> 'required',

        ];
    }
    public function messages()
    {
        return [
            'description.* .required' => 'Please fill description',
            'start_date.*.required' => 'Please fill start date',
            'end_date.*.required' => 'Please fill end  date',
            'amount.*.required' => 'Please fill amount',
            'completed.required' => 'Please fill completed',
            'user_id.required' => 'Please fill user_id',
            'module_id.required'      => 'module_id is required',
            'module_type.required'      => 'module_type is required',
             'proposal_id.required'      => 'proposal id is required',

        ];
    }
}
