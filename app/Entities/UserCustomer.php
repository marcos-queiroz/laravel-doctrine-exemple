<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "user_customer")]
class UserCustomer
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: User::class)]
    private $user;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Customer::class)]
    private $customer;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }
}
