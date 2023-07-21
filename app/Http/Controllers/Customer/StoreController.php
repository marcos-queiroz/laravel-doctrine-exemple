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

        if ($customer) {
            return response()->json([
                'message' => 'Customer registered successfully',
                'customers' => new CustomerResource($customer),
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to register customer. Please check your input data and try again.'
        ], 422);
    }
}
