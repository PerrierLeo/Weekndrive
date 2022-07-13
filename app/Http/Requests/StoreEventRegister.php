<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRegister extends FormRequest
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
            'car_id' => 'required',
            'second_pilote' => '',
            'third_pilote' => '',
            'first_companion' => '',
            'second_companion' => '',
            'total_companion_price' => 'required|numeric',
            'total_price_ht' => 'required|numeric',
            'total_pilote_price' => 'required|numeric',
        ];
    }
}
