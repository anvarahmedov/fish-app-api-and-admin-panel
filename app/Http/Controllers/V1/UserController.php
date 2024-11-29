<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Filters\V1\UsersFilter;
use App\Http\Collections\V1\UserCollection;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $filter = new UsersFilter();
        $filterItems = $filter->transform($request);

        $includeDevices = $request->query('includeDevices');

        $users = User::where($filterItems);

        if ($includeDevices) {
            $users = $users->with('devices');
        }


        return new UserCollection($users->paginate()->appends($request->query()));

    }

    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    public function show(User $user)
    {
        $includeDevices = request()->query('includeDevices');
        if ($includeDevices) {
            return new UserResource($user->loadMissing('devices'));
        }
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return UserResource::make($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'xabar' => "foydalanuchi muvaffaqiyatli o'chirildi"
        ]);
    }
}
