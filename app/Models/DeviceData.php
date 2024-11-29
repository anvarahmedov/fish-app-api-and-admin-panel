<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceData extends Model
{
    protected $fillable = [
        'light',
        'oxygen',
        'temperature',
        'device_id'
    ];
    /** @use HasFactory<\Database\Factories\DeviceDataFactory> */
    use HasFactory;
    public function device() {
        return $this->belongsTo(Device::class);
    }
}
