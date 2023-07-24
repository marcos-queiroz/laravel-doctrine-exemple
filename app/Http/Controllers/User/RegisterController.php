<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Register;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;

class RegisterController extends Controller
{
    protected Register $register;

    public function __construct(Register $register)
    {
        $this->register = $register;
    }

    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();

        $register = ($this->register)($data);

        if ($register) {
            return response()->json([
                'message' => 'User registered successfully'
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to register user. Please check your input data and try again.'
        ], 422);
    }
}
