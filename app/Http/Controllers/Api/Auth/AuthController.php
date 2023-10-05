<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Services\Api\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class AuthController extends Controller
{

    /**
     * AuthController constructor
     */
    public function __construct(private AuthService $authService) {}

    /**
     * Login user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function loginUser(LoginUserRequest $request): JsonResponse {

        $token = $this->authService->login($request->all());

        if ($token) {
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json([
            'message' => 'Invalid login details'
        ], 401);

    }

    /**
     * Logout user
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return response()->json([
            'ok' => true
        ]);
    }
}
