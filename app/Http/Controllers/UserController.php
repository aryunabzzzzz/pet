<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Cart;
use App\Models\Order;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function __construct(public UserService $userService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        $users = $this->userService->index();
        return UserResource::collection($users);
    }

    public function show(int $id): UserResource
    {
        $user = $this->userService->show($id);
        return new UserResource($user);
    }

    public function store(StoreUserRequest $request): UserResource
    {
        $user = $this->userService->store($request->storeUserDTO());
        return new UserResource($user);
    }

    public function update(StoreUserRequest $request, int $id): int
    {
        return $this->userService->update($request->storeUserDTO(), $id);
    }

    public function destroy(int $id): int
    {
        return $this->userService->destroy($id);
    }
}
