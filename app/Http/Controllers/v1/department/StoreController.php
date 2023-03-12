<?php

namespace App\Http\Controllers\v1\department;

use App\Http\Controllers\Controller;
use App\Http\Requests\department\StoreRequest;
use App\Models\Department;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $department = $request->validated();

        Department::create($department);
    }
}
