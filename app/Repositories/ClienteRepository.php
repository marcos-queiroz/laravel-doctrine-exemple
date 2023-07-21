<?php

namespace App\Repositories;

use App\Entities\Cliente;
use Doctrine\ORM\EntityManagerInterface;

class ClienteRepository extends Repository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, Cliente::class);
    }
}
