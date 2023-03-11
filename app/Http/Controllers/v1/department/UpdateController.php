<?php

namespace App\Http\Controllers\v1\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\department\UpdateRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Traits\HttpResponses;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     * @param UpdateRequest $request
     * @param $department
     * @return \Illuminate\Http\RedirectResponse
     */
    use HttpResponses;

    public function __invoke(UpdateRequest $request, Department $department)
    {
        $data = $request->validated();
        $result = $department->update($data);

        return $this->succes($result, 'Uraa', 200);
    }
}
