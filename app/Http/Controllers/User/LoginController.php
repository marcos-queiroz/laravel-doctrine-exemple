<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Tehe provided credentials are incorrect']
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken('api')->plainTextToken;

        return response()->json([
            'message' => 'Authentication successful',
            'token' => $token
        ]);
    }
}
