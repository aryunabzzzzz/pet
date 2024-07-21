<?php

namespace App\Services\Auth;

use App\Data\DTO\Auth\RegisterUserDTO;
use App\Models\User;
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
     * @param RegisterUserDTO $DTO
     * @return JsonResponse
     */
    public function register(RegisterUserDTO $DTO): JsonResponse
    {
        $user = User::create([
            'role_id' => $DTO->roleId,
            'name' => $DTO->name,
            'phone' => $DTO->phone,
            'email' => $DTO->email,
            'birthday' => $DTO->birthday,
            'password' => Hash::make($DTO->password),
        ]);
        $token = auth()->login($user);

        return $this->respondWithToken($token);

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
