<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
class CreateTaskRequest extends FormRequest
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
            'description' => 'required|min:'.config('settings.work_diary_task_min_text_length').'| max:'.config('settings.work_diary_task_max_text_length'),
            'start_time' => 'required',
            'end_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    $start_time = $this->input('start_time');
                    if ($value <= $start_time) {
                        $fail('The end time must be greater than the start time.');
                    }
                },
            ],
            'planning_date' => 'required',
            'contract_id'   => 'required',
        ];
    }
    public function messages()
    {
        return [
            'timezone_id.required' => 'The timezone field is required',
            

        ];
    }
    protected function failedValidation(Validator $validator)
    {
  
        $response = response()->json([
            'status' => 422,
            'errors' => $validator->errors()
        ]);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
