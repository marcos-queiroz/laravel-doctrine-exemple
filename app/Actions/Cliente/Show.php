<?php

namespace App\Actions\Cliente;

use App\Repositories\ClienteRepository;

class Show
{
    private ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function __invoke($id)
    {
        return $this->clienteRepository->findById($id);
    }
}
