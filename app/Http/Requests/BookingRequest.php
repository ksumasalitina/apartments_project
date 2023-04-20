<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'guest_firstname' => ['required', 'string','min:2','max:20'],
            'guest_lastname' => ['required', 'string','min:2','max:20'],
            'guest_email' => ['required', 'string', 'email'],
            'apartment_id' => ['required', 'integer'],
            'room_id' => ['required', 'integer'],
            'notice' => ['nullable', 'string', 'max:500']
        ];
    }
}
