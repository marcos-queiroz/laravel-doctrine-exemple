<?php

namespace App\Http\Controllers\Customer;

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Customer\Update;
use App\Http\Requests\Customer\UpdateRequest;
use App\Http\Resources\CustomerResource;

class UpdateController extends Controller
{
    private Update $update;

    public function __construct(Update $update)
    {
        $this->update = $update;
    }

    public function __invoke(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $cliente = ($this->update)($id, $data);

        if (empty($cliente)) {
            return response()->json(['message' => 'Client not found.'], 404);
        }

        return new CustomerResource($cliente);
    }
}
