<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:8|unique:departments,name,'.$this->id
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên phòng ban không được để trống',
            'name.min' => 'Tên phòng ban dài hơn 8 kí tự',
            'name.unique' => 'Tên phòng ban đã tồn tại'
        ];
    }
}
