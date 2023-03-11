<?php

namespace App\Http\Controllers\v1\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\department\UpdateRequest;
use App\Models\Department;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     * @param UpdateRequest $request
     * @param $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Department $department)
    {
        $data = $request->validated();
        $department->update($data);

        return redirect()->route('department.index');
    }
}
