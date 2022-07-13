<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCar extends FormRequest
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
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|numeric',
            'license_plate' => 'required|string',
            'gray_card' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'green_card' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'car_photo' => 'required|mimes:jpeg,jpg,png|max:2048',

        ];


    }
}
