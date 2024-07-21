<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(public UserService $userService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $users = $this->userService->index();
        return UserResource::collection($users);
    }

    /**
     * @param int $id
     * @return UserResource
     */
    public function show(int $id): UserResource
    {
        $user = $this->userService->show($id);
        return new UserResource($user);
    }

    /**
     * @param StoreUserRequest $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request): UserResource
    {
        $user = $this->userService->store($request->storeUserDTO());
        return new UserResource($user);
    }

    /**
     * @param StoreUserRequest $request
     * @param int $id
     * @return int
     */
    public function update(StoreUserRequest $request, int $id): int
    {
        return $this->userService->update($request->storeUserDTO(), $id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {
        return $this->userService->destroy($id);
    }
}
