<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'brith_date' => 'nullable|date',
            'gender' => 'nullable|string',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email:rfc,dns|unique:users,email',
            'password' => 'nullable|string|min:8|confirmed',
            'amount' => 'nullable|numeric',
        ];
    }
}
