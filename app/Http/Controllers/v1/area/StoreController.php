<?php

namespace App\Http\Controllers\v1\area;

use App\Http\Controllers\Controller;
use App\Http\Requests\area\StoreRequest;
use App\Models\Area;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $area = $request->validated();

        Area::create($area);
    }
}
