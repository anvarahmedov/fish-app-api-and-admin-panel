<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'fullname' => ['required', 'string'],
               // 'type' => ['required', Rule::in(['I', 'B', 'i', 'b'])],
                'email' => ['required', 'email'],
                'address' => ['required', 'string'],
            ];
        } else {
            return [
                'fullname' => ['required', 'string', 'sometimes'],
               // 'type' => ['required', Rule::in(['I', 'B', 'i', 'b'])],
                'email' => ['sometimes', 'required', 'email'],
                'address' => ['sometimes', 'required', 'string'],
            ];
        }
    }
}
