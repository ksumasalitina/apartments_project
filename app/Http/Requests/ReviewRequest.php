<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'title' => ['string', 'min:2', 'max:100', 'required'],
            'comment' => ['string', 'min:2', 'max:5000', 'required'],
            'rate' => ['integer', 'min:1', 'max:10', 'required'],
            'clean' => ['integer', 'min:1', 'max:10', 'required'],
            'staff' => ['integer', 'min:1', 'max:10', 'required'],
            'comfort' => ['integer', 'min:1', 'max:10', 'required'],
            'location' => ['integer', 'min:1', 'max:10', 'required'],
            'apartment_id' => ['integer','required', 'min:1']
        ];
    }
}
