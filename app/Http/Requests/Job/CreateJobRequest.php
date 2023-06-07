<?php

namespace App\Http\Requests\Job;

use App\Models\BudgetType;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CreateJobRequest extends FormRequest
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
        $rules= [
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'country_id' => 'required',
            'job_type_id' => 'required|exists:job_types,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'exists:sub_categories,id',
            'project_stage_id' => 'exists:project_stages,id',
            'expected_start_date' => 'required|after_or_equal:' . Carbon::now()->format('d-m-Y'),
            'project_length_id' => 'exists:project_lengths,id',
            'rank_id' => 'required|exists:ranks,id',
            'budget_type_id' => 'required|exists:budget_types,id',
            'deliverables' => 'required|array',
            'deliverables.*' => 'required|string|distinct|exists:deliverables,id',
            'dod' => 'required|array',
            'skills' => 'required|array',
            'dod.*' => 'required|string|distinct|exists:d_o_d_s,id',
            'file' => 'nullable'
        ];
        if ($this->budget_type_id == BudgetType::$hourly) {
            $rules['hourly_start_range'] = 'gt:0|min:5|max:9999|required:budget_type_id,' . BudgetType::$hourly;
            $rules['hourly_end_range'] = 'gte:hourly_start_range|max:9999|required:budget_type_id,' . BudgetType::$hourly;
        } elseif ($this->budget_type_id == BudgetType::$fixed) {
            $rules['fixed_amount'] = 'required:budget_type_id,' . BudgetType::$fixed . '|gt:0|min:5|max:9999';
        } else {

        }
        return $rules;
    }

    public function messages()
    {
        return [

            'hourly_start_range.required_if' => 'Hourly Rate start field is required when budget type is hourly',
            'country_id.required' => 'Job location is required',
            'hourly_end_range.required_if' => 'Hourly Rate end field is required when budget type is hourly',
            'fixed_amount.required_if' => 'Fixed amount field is required when budget type is fixed',
            'hourly_start_range.gt' => 'Hourly Rate start field should be greater than zero',
            'hourly_end_range.gte' => 'Hourly Rate end field value should be greater or equal to weekly start range',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
  
        $response = response()->json([
            'status' => 422,
            'errors' => $validator->errors()//$validator->errors()
        ]);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}

