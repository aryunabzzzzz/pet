<?php

namespace App\Services\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

class LoginService
{
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

    private function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in'=>Config::get('jwt.ttl')
        ]);
    }

    public function logout(): bool
    {
        auth()->logout();
        return true;
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }



}
