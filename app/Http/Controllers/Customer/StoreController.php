<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Actions\Customer\Store;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Resources\CustomerResource;

class StoreController extends Controller
{
    /**
     * @var \App\Actions\Customer\Store
     */
    private Store $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        $customer = ($this->store)($data);

        return new CustomerResource($customer);
    }
}
