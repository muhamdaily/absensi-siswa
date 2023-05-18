<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required', 'min:6',
            'password' => 'required', 'min:6',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username harap diisi',
            'username.min' => 'Username minimal 6 huruf',

            'password.required' => 'Password harap diisi',
            'password.min' => 'Password minimal 6 huruf',
        ];
    }
}