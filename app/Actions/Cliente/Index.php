<?php

namespace App\Actions\Cliente;

use App\Repositories\ClienteRepository;

class Index
{
    /**
     * @var \App\Repositories\ClienteRepository;
     */
    private ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function __invoke()
    {
        return $this->clienteRepository->getAll();
    }
}
