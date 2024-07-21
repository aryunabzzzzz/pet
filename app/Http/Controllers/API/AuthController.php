<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\JustBoolResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param AuthService $loginService
     */
    public function __construct(public AuthService $loginService)
    {
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return $this->loginService->login($request->getEmail(), $request->getPassword());
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->loginService->register($request->registerUserDTO());
    }

    /**
     * @return JustBoolResource
     */
    public function logout(): JustBoolResource
    {
        $result = $this->loginService->logout();
        return new JustBoolResource($result);
    }

    /**
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->loginService->refresh();
    }
}
