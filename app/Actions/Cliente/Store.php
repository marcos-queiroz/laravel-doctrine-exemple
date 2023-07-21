<?php

namespace App\Actions\Cliente;

use App\Repositories\ClienteRepository;

class Store
{
    private ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function __invoke(array $data)
    {
        return $this->clienteRepository->create($data);
    }
}
