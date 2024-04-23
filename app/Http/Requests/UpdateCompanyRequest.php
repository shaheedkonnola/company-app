<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','min:3','string'],
            'description' => ['required','string'] ,
            'logo_path' => ['image', 'required'],
            'phone' => ['required','integer','min:10', 'maX:10'],
            'annual_turn_over' =>  ['required','numeric']
        ];
    }
}
