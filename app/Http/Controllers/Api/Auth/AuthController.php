<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Spatie\RouteAttributes\Attributes\Post;

class AuthController extends Controller
{
    /**
     * create new user
     */
    #[Post('signgup')]
    public function singnUp(UserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->result(data: ["token" => $user->getToken($request->device_name)]);
    }

    #[Post('login')]
    public function login(LoginRequest $request)
    {   
        $user = User::whereEmail($request->email)->active()->first();

        if (is_null($user)) {
            throw ValidationException::withMessages(["email" => [
                __("auth.failed")
            ]]);
        }

        if (!$user->checkPassword($request->password)) {
            throw ValidationException::withMessages(["password" => [
                __("auth.password")
            ]]);
        }

        return response()->result(
            message: __("auth.success"),
            data: [
                "access_token" => $user->getToken($request->device_name)
            ]
        );
    }
}
