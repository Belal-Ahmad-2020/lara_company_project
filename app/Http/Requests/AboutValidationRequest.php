<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutValidationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'string|min:5|max:255',
            'short_des' => "min:3",
            'long_des' => 'min:3'
        ];
    }
}
