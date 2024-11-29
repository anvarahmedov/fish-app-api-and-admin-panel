<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Invoice;

class DeviceResource extends JsonResource
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
            'deviceName' => $this->device_name,
            'userId' => $this->user_id,
            'city' => $this->city,
            'region' => $this->region,
            'country' => $this->country,
            'latitude' => $this->latitude,
            'longtitude' => $this->longtitude,
            'deviceDatas' => DeviceDataResource::collection($this->whenLoaded('device_datas'))
        ];
    }
}
