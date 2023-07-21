<?php

namespace App\Repositories;

use App\Entities\Customer;
use Doctrine\ORM\EntityManagerInterface;

class CustomerRepository extends Repository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, Customer::class);
    }
}
