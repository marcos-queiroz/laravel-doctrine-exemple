<?php

namespace App\Actions\Customer;

use App\Repositories\CustomerRepository;

class Destroy
{
    private CustomerRepository $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function __invoke($id)
    {
        if (!$this->CustomerRepository->findById($id)) {
            return false;
        }

        return $this->CustomerRepository->delete($id);
    }
}
