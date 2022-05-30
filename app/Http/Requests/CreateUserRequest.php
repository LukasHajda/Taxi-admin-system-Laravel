<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'first_name' => 'string|required|min:4|max:255',
            'last_name' => 'string|required|min:4|max:255',
            'email' => 'required|email:rfc,dns|max:188|unique:users,email,' . $this->route('id'),
            'phone_number' => 'string|regex:/[0-9]+/',
            'password' => 'required|min:6|max:255',
            'username' => 'string|required|min:4|max:255|regex:/x[A-Za-z]+[1-9]*/',
            'role' => ['required', 'regex:/Vodič|Operátor|Supervisor/'],
            'image' => 'required|file|image'
        ];
    }
}
