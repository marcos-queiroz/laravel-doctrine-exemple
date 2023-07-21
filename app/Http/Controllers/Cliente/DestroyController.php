<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Actions\Cliente\Destroy;

class DestroyController extends Controller
{
    private Destroy $destroy;

    public function __construct(Destroy $destroy)
    {
        $this->destroy = $destroy;
    }

    public function __invoke($id)
    {
        $success = ($this->destroy)($id);

        if (!$success) {
            return response()->json(['message' => 'Cliente não encontrado.'], 404);
        }

        return response()->json(['message' => 'Cliente excluído com sucesso.']);
    }
}

