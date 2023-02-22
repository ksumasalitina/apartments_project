<?php

namespace App\Http\Requests;

use App\Rules\DateRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required','string','min:2','max:20'],
            'last_name' => ['required','string','min:2','max:20'],
            'email' => ['required', 'string', 'email','unique:users'],
            'password' => ['required', 'confirmed', 'min:8','max:20'],
            'dob' => [ 'required', new DateRule()],
            'phone' => ['required','min:10','max:15'],
            'nationality' => ['required','min:2','max:50'],
            'avatar' => ['nullable']
        ];
    }
}
