<?php

namespace App\Api\V1\Requests;

use Dingo\Api\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
            'email' => 'required|email|max:255|exists:users',
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'Sorry the email address you entered does not exist.',
        ];
    }
}
