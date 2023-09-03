<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDeleteRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required|in:M,F',
            'user_role' => 'required',
            'password' => 'required|confirmed|min:8',
            'adddress' => 'required',
        ];
    }
}
