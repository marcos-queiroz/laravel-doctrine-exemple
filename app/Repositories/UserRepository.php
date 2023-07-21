<?php

namespace App\Repositories;

use App\Entities\User;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository
{
    protected $entityManager;
    protected $entityClass;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityClass = User::class;
    }

    public function create(array $data)
    {
        $user = new User();
        $user->setName($data['name']);
        $user->setEmail($data['email']);
        $user->setEmailVerified(false); // Setar o email como não verificado por padrão
        $user->setPassword(bcrypt($data['password']));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
