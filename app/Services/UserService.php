<?php

namespace App\Services;

use App\Data\DTO\User\StoreUserDTO;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class UserService
{
    public function index(): Collection
    {
        $key = 'users_list';
        $ttl = 600;
        $users = Cache::get($key);
        if ($users == null){
            $users = Cache::remember($key, $ttl, function () {
                return User::all();
            });
        }
        return $users;
    }

    public function show(int $id): User
    {
        return User::find($id);
    }

    public function store(StoreUserDTO $DTO): User
    {
        return User::create($DTO->toArray());
    }

    public function update(StoreUserDTO $DTO, int $id): int
    {
        return User::where('id', $id)->update($DTO->toArray());
    }

    public function destroy(int $id): int
    {
        return User::destroy($id);
    }

    public function getCart(int $userId): Cart
    {
        $cart = User::find($userId)->cart;
        return $cart;
    }

}
