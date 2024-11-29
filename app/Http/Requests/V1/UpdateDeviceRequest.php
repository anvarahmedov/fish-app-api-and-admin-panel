<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeviceRequest extends FormRequest
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
                    'deviceName' => ['required', 'string'],
                    'city' => ['string', 'nullable'],
                    'country' => ['string', 'nullable'],
                    'region' => ['string', 'nullable'],
                    'latitude' => ['decimal:min:-90,max:90', 'nullable'],
                    'longtitude' => ['decimal:min:-180,max:180', 'nullable'],
                ];
            } else {
                return [
                    'deviceName' => ['sometimes', 'required', 'string'],
                    'city' => ['sometimes', 'required', 'string'],
                    'country' => ['sometimes','required', 'string'],
                    'region' => ['sometimes', 'required', 'string'],
                    'latitude' => ['sometimes', 'required', 'decimal:min:-90,max:90'],
                    'longtitude' => ['sometimes', 'required', 'decimal:min:-180,max:180'],
                ];
            }

        }
        protected function prepareForValidation()
        {
            if ($this->postalCode) {
                $this->merge([
                    'device_name' => $this->deviceName,
                ]);
            }
        }

    }

