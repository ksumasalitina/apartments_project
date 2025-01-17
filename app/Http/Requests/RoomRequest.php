<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'apartment_id' => ['required', 'integer'],
            'people' => ['required', 'integer', 'min:1', 'max:10'],
            'floor' => ['required','integer', 'min:1'],
            'number' => ['required'],
            'beds' => ['required', 'min:1'],
            'description' => ['required', 'string'],
            'cost' => ['required']
        ];
    }
}
