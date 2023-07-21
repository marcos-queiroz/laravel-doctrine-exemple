<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

#[ORM\Entity(repositoryClass: UserRepository::class, readOnly: false)]
#[ORM\Table(name: "users")]
class User implements AuthenticatableContract, CanResetPasswordContract
{
    use \Illuminate\Auth\Authenticatable, \Illuminate\Auth\Passwords\CanResetPassword;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string")]
    private $name;

    #[ORM\Column(type: "string", unique: true)]
    private $email;

    #[ORM\Column(type: "string")]
    private $password;

    #[ORM\Column(type: "boolean")]
    private $emailVerified = false;

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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function isEmailVerified()
    {
        return $this->emailVerified;
    }

    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;
    }

    #[ORM\ManyToMany(targetEntity: Customer::class, mappedBy: "users")]
    private $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    public function getCustomers()
    {
        return $this->customers;
    }
}
