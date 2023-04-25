<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'name' => ['required','string','min:2','max:50'],
            'type' => ['required','string','min:2','max:20'],
            'city_id' => ['required','integer'],
            'building' => ['required'],
            'street' => ['required','string','min:2','max:50'],
            'postcode' => ['required'],
            'email' => ['required','email'],
            'stars' => ['required','integer'],
            'description' => ['required','string','min:10'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'image_1' => ['required','file'],
            'image_2' => ['required','file'],
            'image_3' => ['required','file'],
            'facilities' => ['required']
        ];
    }
}
