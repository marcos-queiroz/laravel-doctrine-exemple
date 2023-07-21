<?php

namespace App\Actions\Customer;

use App\Repositories\CustomerRepository;

class Show
{
    private CustomerRepository $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function __invoke($id)
    {
        return $this->CustomerRepository->findById($id);
    }
}
