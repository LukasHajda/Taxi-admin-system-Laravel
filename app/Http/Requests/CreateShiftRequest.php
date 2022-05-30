<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShiftRequest extends FormRequest
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
            'started_at' => 'required|regex:/[0-9]{2}-[0-9]{2}-[0-9]{4}/',
            'supervisor' => 'string|required|exists:users,id',
            'operators' => 'array|required|min:1',
            'drivers' => 'array|required|min:1',
        ];
    }
}
