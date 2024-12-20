<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $allowedPrefixes = [
            '93', '94', '95', '97', '98', '90', '91', '98', '95', '99', '97', '33'
            ];
                $prefixPattern = implode('|', $allowedPrefixes);
                $regex = "/^($prefixPattern)/";
        return [
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string'],
            'phoneNumber' => ['required', 'string', 'max:9', 'min:9', 'regex:' . $regex]
        ];
    }
        protected function prepareForValidation(){
            $this->merge([
                'phone_number' => $this->phoneNumber
            ]);
        }
}
