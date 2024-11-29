<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Invoice;

class BulkStoreDeviceRequest extends FormRequest
{
    // protected array $data;
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

     */
    public function rules(): array
    {
        return [
            '*.user_id' => ['required', 'integer'],
            '*.device_name' => ['required', 'string'],
            '*.city' => ['string','nullable'],
            '*.country' => ['string', 'nullable'],
            '*.latitude' => ['decimal','nullable'],
            '*.longtitude' => ['decimal','nullable'],
        ];
    }
    protected function prepareForValidation()
    {
        $data = [];

       foreach($this->toArray() as $obj) {
            // dd($obj);
            $obj['user_id'] = $obj['userId'] ?? null;
            $obj['device_name'] = $obj['deviceName'] ?? null;
            //   array_merge($data, $obj);
        }

        $this->merge($data);
    }
}
