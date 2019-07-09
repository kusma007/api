<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InfoRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:infos,email',
            'description' => 'required|string',
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'id' => 'required|integer|exists:infos,id',
                    'email' => [
                        'required',
                        Rule::unique('infos')->ignore($this->email, 'email')
                    ]
                ] + $rules;
            // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:infos,id'
                ];
        }
    }
}
