<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;

    protected $fillable = [
        'device_name',
        'city',
        'region',
        'country',
        'latitude',
        'longtitude',
        'device_datas',
        'user_id'
    ];

    public function device_datas() {
        return $this->hasMany(DeviceData::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
