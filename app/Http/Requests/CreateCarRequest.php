<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
            'brand' => 'string|required|min:3|max:255',
            'model' => 'string|required|min:1|max:255',
            'license_number' => 'string|required|regex:/[A-Z]{2}[0-9]{3}[A-Z]{2}/'
        ];
    }
}
