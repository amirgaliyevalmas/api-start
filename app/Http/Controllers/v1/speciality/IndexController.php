<?php

namespace App\Http\Controllers\v1\speciality;

use App\Http\Controllers\Controller;
use App\Http\Filters\SpecialityFilter;
use App\Http\Requests\speciality\SpecialityRequest;
use App\Http\Resources\SpecialityResource;
use App\Models\Speciality;
use App\Traits\HttpResponses;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */

    use HttpResponses;

    public function __invoke(SpecialityRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(SpecialityFilter::class, ['queryParams' => array_filter($data)]);

        $specialities = Speciality::with('department')->filter($filter)->paginate(10, ['*'], 'page', $data['page']);


        return SpecialityResource::collection($specialities);
    }


    public function one($id){
        $speciality = Speciality::find($id);
        return $speciality;
    }
}
