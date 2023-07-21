<?php

namespace App\Http\Resources;

use App\Entities\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function __construct(Customer $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'email' => $this->getEmail(),
            'users' => $this->getUsers()
        ];
    }
}
