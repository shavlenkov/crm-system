<?php

namespace App\Services\Api;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Method that returns a token
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(array $data) {
        if (!Auth::attempt($data) || (User::where('email', $data['email'])->first())->status == 0) {
            return null;
        }

        $user = User::where('email', $data['email'])->firstOrFail();

        return $user->createToken('auth_token')->plainTextToken;

    }

    /**
     * Method that delete the current access token
     *
     * @return void
     */
    public function logout() {
        Auth::user()->currentAccessToken()->delete();
    }

}
