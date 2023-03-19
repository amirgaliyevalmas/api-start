<?php

namespace App\Http\Controllers\v1\Department;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Traits\HttpResponses;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */

    use HttpResponses;

    public function __invoke()
    {
        $departments = Department::paginate(10);

        return DepartmentResource::collection($departments);
    }

    public function all(){
        $department = Department::all();
        return DepartmentResource::collection($department);
    }

    public function getDepartment($id){
        $department = Department::find($id);
        return $department;
    }
}
