<?php

namespace App\Actions\Cliente;

use App\Repositories\ClienteRepository;

class Destroy
{
    private ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function __invoke($id)
    {
        if (!$this->clienteRepository->findById($id)) {
            return false;
        }

        return $this->clienteRepository->delete($id);
    }
}
