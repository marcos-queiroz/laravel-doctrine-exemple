<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Actions\Cliente\Index;
use App\Http\Resources\ClienteResource;

class IndexController extends Controller
{
    private Index $index;

    public function __construct(Index $index)
    {
        $this->index = $index;
    }

    public function __invoke()
    {
        $clientes = ($this->index)();

        if (empty($clientes)) {
            return response()->json(['message' => 'Nenhum cliente encontrado.'], 404);
        }

        return ClienteResource::collection($clientes);
    }
}
