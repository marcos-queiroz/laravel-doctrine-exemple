<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Actions\Cliente\Show;
use App\Http\Resources\ClienteResource;

class ShowController extends Controller
{
    private Show $show;

    public function __construct(Show $show)
    {
        $this->show = $show;
    }

    public function __invoke($id)
    {
        $cliente = ($this->show)($id);

        if (empty($cliente)) {
            return response()->json(['message' => 'Cliente não encontrado.'], 404);
        }

        return new ClienteResource($cliente);
    }
}
