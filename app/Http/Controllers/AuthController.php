<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $request->validated($request->all());

        $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return $this->error('', 'Неверный логин и/или пароль', 401);
            }

        $user = User::where('email', $request->email)->first();

        return $this->succes([
            'user' => $user,
            'token' => $user->createToken('Api token of ' . $user->name)->plainTextToken
        ]);
    }

    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());
        $password = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);

        return $this->succes([
            'user' => $user,
            'token' => $user->createToken('Api token of ' . $user->name)->plainTextToken
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->succes([
            'message' => 'You have successfully been loged out and your token has been deleted'
        ]);
    }
}
