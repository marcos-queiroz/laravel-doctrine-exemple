<?php

namespace App\Actions\Customer;

use App\Repositories\CustomerRepository;

class Store
{
    private CustomerRepository $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function __invoke(array $data)
    {
        return $this->CustomerRepository->create($data);
    }
}
