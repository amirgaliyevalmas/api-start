<?php

namespace App\Http\Controllers\v1\speciality;

use App\Http\Controllers\Controller;
use App\Http\Requests\speciality\StoreRequest;
use App\Models\Speciality;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $speciality = $request->validated();

        Speciality::create($speciality);
    }
}
