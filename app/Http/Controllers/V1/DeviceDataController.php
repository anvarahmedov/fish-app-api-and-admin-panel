<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreDeviceDataRequest;
use App\Http\Requests\V1\UpdateDeviceDataRequest;
use Illuminate\Http\Request;
use App\Models\DeviceData;
use App\Http\Resources\V1\DeviceDataResource;
use App\Http\Collections\V1\DeviceDataCollection;
use App\Filters\V1\DeviceDatasFilter;

class DeviceDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new DeviceDatasFilter();
        $filterItems = $filter->transform($request);

       // $includeDeviceDatas = $request->query('includeDeviceDatas');

        $device_datas = DeviceData::where($filterItems);
        return new DeviceDataCollection($device_datas->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeviceDataRequest $request)
    {
        //$data = $request->validated();
      //  $device_data = DeviceData::create($data);

      return new DeviceDataResource(DeviceData::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(DeviceData $device_data)
    {
        return new DeviceDataResource($device_data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeviceData $device_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceDataRequest $request, DeviceData $device_data)
    {
        $data = $request->validated();
        $device_data->update($data);

        return DeviceDataResource::make($device_data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeviceData $device_data)
    {
        $device_data->delete();

        return response()->json([
            'xabar' => "qurilma ma'lumotlari muvaffaqiyatli o'chirildi"
        ]);
    }
}
