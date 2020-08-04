<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        // I just did the bare minimum validation, according to initial 'users' table migration
        return [
            'name' => 'required',
            'email' => [
                'required',
                // function ($attribute, $value, $fail) {
                //     // Common email format regEx, google search
                //     $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

                //     if (preg_match($pattern, $value)) {
                //         return $fail('The ' . $attribute . 'is in wrong format');
                //     }
                // }
            ],
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Username field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'The input email was in wrong format',
            'password.required' => 'Password field is required',
        ];
    }
}
