<?php

namespace App\Http\Requests\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioRequest extends FormRequest
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
            'name' => 'required',
            'completion_date' => 'required|date|before:today|after:' . Config('settings.minimum_system_start_date'),
            'skills' => 'nullable|array|max:15',
            'skills.*' =>'exists:skills,id',
            'project_url' => 'nullable',
            'description' => 'nullable|max:300',
            'video_url' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[\w-]{11}/i'],
            'project_url' => ['nullable',"regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'project name field is required.',
            'video_url.regex'     => 'youtube url format is invalid.',
            'project_url.regex'   => 'public url format is invalid.'
        ];
    }
}
