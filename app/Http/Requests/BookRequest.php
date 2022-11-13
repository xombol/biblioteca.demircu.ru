<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:70'],
            'description'  => ['required'],
            'authors' => ['required', 'array'],
            'authors.*.name' => ['required']
        ];
    }
}
