<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Filters\V1\DevicesFilter;
use App\Models\Device;
use App\Http\Collections\V1\DeviceCollection;
use App\Http\Requests\V1\StoreDeviceRequest;
use App\Http\Requests\V1\BulkStoreDeviceRequest;
use App\Http\Resources\V1\DeviceResource;
use App\Http\Requests\V1\UpdateDeviceRequest;
use App\Http\Resources\V1\DeviceDataResource;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        $filter = new DevicesFilter();
        $filterItems = $filter->transform($request);

        $includeDeviceDatas = $request->query('includeDeviceDatas');

        $devices = Device::where($filterItems);

        if ($includeDeviceDatas) {
            $devices = $devices->with('device_datas');
        }


        return new DeviceCollection($devices->paginate()->appends($request->query()));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeviceRequest $request)
    {
        return new DeviceResource(Device::create($request->all()));
    }

    public function bulkStore(BulkStoreDeviceRequest $request) {
        $bulk = collect($request->all())->map(function($arr, $key) {
            return $arr;
        });

        Device::insert($bulk->toArray());
    }

    public function show(Device $device)
    {
        $includeDeviceDatas = request()->query('includeDeviceDatas');
        if ($includeDeviceDatas) {
            return new DeviceResource($device->loadMissing('device_datas'));
        }
        return new DeviceResource($device);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceRequest $request, Device $device)
    {
        $data = $request->validated();
        $device->update($data);

        return DeviceResource::make($device);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return response()->json([
            'xabar' => "qurilma muvaffaqiyatli o'chirildi"
        ]);
    }
}
