<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Users extends FormRequest
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
            'pseudo' => ['required', 'string', 'max:30'],
            'avatar' => ['image', 'max:2000'],
            'name' => ['required', 'string', 'max:30'],
            'firstname' => ['required', 'string', 'max:30'],
            'sexe' => ['required', 'string', 'max:2'],
            'adress' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['required', 'integer'],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string'],
        ];
    }
}
