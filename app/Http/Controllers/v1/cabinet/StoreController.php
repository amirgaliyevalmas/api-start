<?php

namespace App\Http\Controllers\v1\cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\cabinet\StoreRequest;
use App\Models\Cabinet;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $cabinet = $request->validated();

        Cabinet::create($cabinet);
    }
}
