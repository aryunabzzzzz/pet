<?php

namespace App\Services;

use App\Data\DTO\Customer\StoreCustomerDTO;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class CustomerService
{
    /**
     * @return Collection
     */
    public function index(): Collection
    {
        $key = 'users_list';
        $ttl = 600;
        $users = Cache::get($key);
        if ($users == null){
            $users = Cache::remember($key, $ttl, function () {
                return Customer::all();
            });
        }
        return $users;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function show(int $id): Customer
    {
        return Customer::find($id);
    }

    /**
     * @param StoreCustomerDTO $DTO
     * @return Customer
     */
    public function store(StoreCustomerDTO $DTO): Customer
    {
        return Customer::create($DTO->toArray());
    }

    /**
     * @param StoreCustomerDTO $DTO
     * @param int $id
     * @return int
     */
    public function update(StoreCustomerDTO $DTO, int $id): int
    {
        return Customer::where('id', $id)->update($DTO->toArray());
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {
        return Customer::destroy($id);
    }

    /**
     * @param int $userId
     * @return Cart
     */
    public function getCart(int $userId): Cart
    {
        $cart = Customer::find($userId)->cart;
        return $cart;
    }
}
