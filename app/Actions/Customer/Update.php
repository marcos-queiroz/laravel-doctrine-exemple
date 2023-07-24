<?php

namespace App\Actions\Customer;

use App\Repositories\CustomerRepository;

class Update
{
    private CustomerRepository $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function __invoke($id, array $data)
    {
        return $this->CustomerRepository->update($id, $data);
    }
}
