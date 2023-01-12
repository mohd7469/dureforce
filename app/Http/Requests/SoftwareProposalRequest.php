<?php

namespace App\Http\Requests;
use Route;
use Illuminate\Foundation\Http\FormRequest;

class SoftwareProposalRequest extends FormRequest
{
    protected $redirect = "";
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        $this->redirect =route('user.software.create', ['id' => $this->software_id, 'view' => 'step-4']);
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

            'delivery_mode_id' => 'required|exists:delivery_modes,id',
            'project_end_date' => 'required|date|after_or_equal:project_start_date',
            'project_start_date' => 'required|date|after_or_equal:now',
            'fixed_bid_amount' => 'required',
            'amount_receive' => 'required',
            'cover_letter' => 'required|string|min:20'

        ];
    }
}
