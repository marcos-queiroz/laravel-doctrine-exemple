<?php

namespace App\Entities;

use App\Repositories\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClienteRepository::class, readOnly: false)]
#[ORM\Table(name: "clientes")]
class Cliente
{
    #[ORM\Id, ORM\Column(type: "integer"), ORM\GeneratedValue()]
    private $id;

    #[ORM\Column(type: "string")]
    private $nome;

    #[ORM\Column(type: "string")]
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
