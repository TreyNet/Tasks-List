<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Specifies the validation rules for incoming request data.
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required'
        ];
    }
}
