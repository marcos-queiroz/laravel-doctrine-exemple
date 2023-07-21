<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Repositories\UserRepository;

class RegisterController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->userRepository->create($data);

        return response()->json(['message' => 'User registered successfully'], 201);
    }
}
