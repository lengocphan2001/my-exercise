<?php

namespace App\Http\Requests\User;

use http\Message;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'min:8|required|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'password.min' => 'Mật khẩu tối thiếu có 8 kí tự',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
            'password.required' => 'Mật khẩu không được để trống'
        ];
    }
}
