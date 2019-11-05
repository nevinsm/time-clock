<?php

namespace App\Http\Requests;

use App\Student;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'required', 'min:3'
            ],
            'last_name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new Student)->getTable())->ignore($this->route()->student->id ?? null)
            ]
        ];
    }
}
