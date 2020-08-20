<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Travel extends FormRequest
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
            'category_id' => 'required',
            'description' => ['required', 'string', 'max:100000'],
            'price' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'date_start' => ['required', 'date', 'after:today'],
            'date_end' => ['required', 'date', 'after:date_start'],
            'date_closure' => ['required', 'before:date_start', 'date_format:Y-m-d H:i:s'],
            'closured' => ['required', 'string', 'max:3'],
        ];
    }
}
