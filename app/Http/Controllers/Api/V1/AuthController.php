<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\V1\LoginUserRequest;
use App\Models\User; // Import the User model

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginUserRequest $request)
    {
        $validatedData = $request->validated();

        if (!Auth::attempt($validatedData)) {
            return $this->error('', 'Invalid Credentials.', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of ' . $user->name)->plainTextToken
        ]);
    }
}
