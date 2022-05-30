<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDriveRequest extends FormRequest
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
            'car_id' => 'required|exists:cars,id',
            'driver_id' => 'required|exists:users,id',
            'shift_id' => 'required|exists:shifts,id',
            'place_from' => 'required|string|min:5|max:255',
            'place_to' => 'required|string|min:5|max:255',
            'salary' => 'required|integer|min:2',
            'distance' => 'required|integer|min:1',
            'phone_number' => 'required|string|regex:/[0-9]{10}/'
        ];
    }
}
