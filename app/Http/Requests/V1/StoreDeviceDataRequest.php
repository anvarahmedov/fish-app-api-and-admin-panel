<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceDataRequest extends FormRequest
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
        return [
            'deviceId' => ['required', 'string'],
            'light' => ['required', 'integer'],
            'oxygen' => ['required', 'integer'],
            'temperature' => ['required', 'integer']
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'device_id' => $this->deviceId
        ]);
    }
}
