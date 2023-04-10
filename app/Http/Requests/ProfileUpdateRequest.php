<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'min:2', 'max:20'],
            'last_name' => ['required', 'min:2', 'max:20'],
            'email' => ['nullable', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['nullable', 'confirmed', 'min:8', 'max:20'],
            'dob'=>['required',],
            'nationality'=>['required', 'min:2','max:50'],
            'phone'=>['required', 'min:10','max:50'],
            'avatar' => ['nullable', 'file']
        ];
    }
}
