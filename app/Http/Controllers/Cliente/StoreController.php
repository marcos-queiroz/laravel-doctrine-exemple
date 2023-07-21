<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Actions\Cliente\Store;
use App\Http\Requests\Cliente\CreateRequest;
use App\Http\Resources\ClienteResource;

class StoreController extends Controller
{
    /**
     * @var \App\Actions\Cliente\Store
     */
    private Store $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        $cliente = ($this->store)($data);

        return new ClienteResource($cliente);
    }
}
