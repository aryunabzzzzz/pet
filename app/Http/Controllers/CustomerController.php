<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Services\CustomerService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    /**
     * @param CustomerService $userService
     */
    public function __construct(public CustomerService $userService)
    {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $users = $this->userService->index();
        return CustomerResource::collection($users);
    }

    /**
     * @param int $id
     * @return CustomerResource
     */
    public function show(int $id): CustomerResource
    {
        $user = $this->userService->show($id);
        return new CustomerResource($user);
    }

    /**
     * @param StoreCustomerRequest $request
     * @return CustomerResource
     */
    public function store(StoreCustomerRequest $request): CustomerResource
    {
        $user = $this->userService->store($request->storeUserDTO());
        return new CustomerResource($user);
    }

    /**
     * @param StoreCustomerRequest $request
     * @param int $id
     * @return int
     */
    public function update(StoreCustomerRequest $request, int $id): int
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
