<?php

namespace App\Entities;

use App\Repositories\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class, readOnly: false)]
#[ORM\Table(name: "customers")]
class Customer
{
    #[ORM\Id, ORM\Column(type: "integer"), ORM\GeneratedValue()]
    private $id;

    #[ORM\Column(type: "string")]
    private $name;

    #[ORM\Column(type: "string")]
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: "users")]
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getUsers()
    {
        return $this->users;
    }
}
