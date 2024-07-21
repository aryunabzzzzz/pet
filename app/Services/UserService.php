<?php

namespace App\Services;

use App\Data\DTO\User\StoreUserDTO;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class UserService
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
                return User::all();
            });
        }
        return $users;
    }

    /**
     * @param int $id
     * @return User
     */
    public function show(int $id): User
    {
        return User::find($id);
    }

    /**
     * @param StoreUserDTO $DTO
     * @return User
     */
    public function store(StoreUserDTO $DTO): User
    {
        return User::create($DTO->toArray());
    }

    /**
     * @param StoreUserDTO $DTO
     * @param int $id
     * @return int
     */
    public function update(StoreUserDTO $DTO, int $id): int
    {
        return User::where('id', $id)->update($DTO->toArray());
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id): int
    {
        return User::destroy($id);
    }

    /**
     * @param int $userId
     * @return Cart
     */
    public function getCart(int $userId): Cart
    {
        $cart = User::find($userId)->cart;
        return $cart;
    }
}
