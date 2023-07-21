<?php

namespace App\Actions\Customer;

use App\Repositories\CustomerRepository;

class Index
{
    /**
     * @var \App\Repositories\CustomerRepository;
     */
    private CustomerRepository $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function __invoke()
    {
        return $this->CustomerRepository->getAll();
    }
}
