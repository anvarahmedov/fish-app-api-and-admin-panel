<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Invoice;

class UserResource extends JsonResource
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
            'fullname' => $this->fullname,
            'email' => $this->email,
            'address' => $this->address,
            'phoneNumber' => $this->phone_number,
            'devices' => DeviceResource::collection($this->whenLoaded('devices'))
        ];
    }
}
