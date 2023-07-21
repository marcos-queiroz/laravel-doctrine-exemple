<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Actions\Customer\Destroy;

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
            return response()->json(['message' => 'Client not found.'], 404);
        }

        return response()->json(['message' => 'Customer deleted successfully.']);
    }
}

