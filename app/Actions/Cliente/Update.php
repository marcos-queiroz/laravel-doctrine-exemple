<?php

namespace App\Actions\Cliente;

use App\Repositories\ClienteRepository;

class Update
{
    private ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function __invoke($id, array $data)
    {
        if (!$this->clienteRepository->findById($id)) {
            return false;
        }

        return $this->clienteRepository->update($id, $data);
    }
}
