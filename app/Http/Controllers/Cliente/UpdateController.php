<?php

namespace App\Http\Controllers\Cliente;

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Cliente\Update;
use App\Http\Requests\Cliente\UpdateRequest;
use App\Http\Resources\ClienteResource;

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
            return response()->json(['message' => 'Cliente não encontrado.'], 404);
        }

        return new ClienteResource($cliente);
    }
}
