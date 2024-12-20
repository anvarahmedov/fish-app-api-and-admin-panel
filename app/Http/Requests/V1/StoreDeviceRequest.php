<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
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
            'userId' => ['required', 'integer'],
            'deviceName' => ['required', 'string'],
            'city' => ['string', 'nullable'],
            'region' => ['string', 'nullable'],
            'country' => ['string', 'nullable'],
            'latitude' => ['decimal:min:-90,max:90', 'nullable'],
            'longtitude' => ['decimal:min:-180,max:180', 'nullable'],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'user_id' => $this->userId,
            'device_name' => $this->deviceName
        ]);
    }
}
