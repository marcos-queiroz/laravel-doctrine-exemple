<?php

namespace App\Actions\User;

use App\Repositories\UserRepository;

class Register
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __invoke(array $data)
    {
        return $this->userRepository->create($data);
    }
}
