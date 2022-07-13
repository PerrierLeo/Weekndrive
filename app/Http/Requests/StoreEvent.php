<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvent extends FormRequest
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
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'available_car' => 'required|numeric',
            'available_place' => 'required|numeric',
            'price' => 'required|numeric',
            'pilote_price' => 'required|numeric',
            'companion_price' => 'required|numeric',
            'image_event' => 'required|mimes:jpeg,jpg,png',
        ];


    }
}
