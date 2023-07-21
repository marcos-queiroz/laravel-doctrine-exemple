<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Actions\Customer\Index;
use App\Http\Resources\CustomerResource;

class IndexController extends Controller
{
    private Index $index;

    public function __construct(Index $index)
    {
        $this->index = $index;
    }

    public function __invoke()
    {
        $customers = ($this->index)();

        if (empty($customers)) {
            return response()->json(['message' => 'No customers found.'], 404);
        }

        return CustomerResource::collection($customers);
    }
}
