<?php

namespace App\Services\Auth;

use App\Data\DTO\Auth\RegisterCustomerDTO;
use App\Jobs\SendEmail;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param string $email
     * @param string $password
     * @return JsonResponse
     */
    public function login(string $email, string $password): JsonResponse
    {
        if (! $token = auth()->attempt([
            'email' => $email,
            'password' => $password
        ])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    private function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in'=>Config::get('jwt.ttl')
        ]);
    }

    /**
     * @param RegisterCustomerDTO $DTO
     * @return JsonResponse
     */
    public function register(RegisterCustomerDTO $DTO): JsonResponse
    {
        $user = $this->create($DTO);
        $token = auth()->login($user);

        $data = [
            'name' => $user->name,
            'email' => $user->email,
        ];
        SendEmail::dispatch($data);

        return $this->respondWithToken($token);

    }

    /**
     * @param RegisterCustomerDTO $DTO
     * @return Customer
     */
    public function create(RegisterCustomerDTO $DTO): Customer
    {
        return Customer::create([
            'name' => $DTO->name,
            'phone' => $DTO->phone,
            'email' => $DTO->email,
            'birthday' => $DTO->birthday,
            'password' => Hash::make($DTO->password),
        ]);
    }

    /**
     * @return bool
     */
    public function logout(): bool
    {
        auth()->logout();
        return true;
    }

    /**
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }
}
