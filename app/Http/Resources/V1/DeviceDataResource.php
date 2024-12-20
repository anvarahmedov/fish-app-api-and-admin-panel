<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Invoice;

class DeviceDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'deviceId' => $this->device_id,
            'light' => $this->light,
            'oxygen' => $this->oxygen,
            'temperature' => $this->temperature,
            'ph' => $this->ph
        ];
    }
}
