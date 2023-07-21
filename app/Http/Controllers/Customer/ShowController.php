<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Actions\Customer\Show;
use App\Http\Resources\CustomerResource;

class ShowController extends Controller
{
    private Show $show;

    public function __construct(Show $show)
    {
        $this->show = $show;
    }

    public function __invoke($id)
    {
        $customer = ($this->show)($id);

        if (empty($customer)) {
            return response()->json(['message' => 'Client not found.'], 404);
        }

        return new CustomerResource($customer);
    }
}
