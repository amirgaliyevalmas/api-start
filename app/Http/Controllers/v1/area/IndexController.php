<?php

namespace App\Http\Controllers\v1\area;

use App\Http\Controllers\Controller;
use App\Http\Filters\AreaFilter;
use App\Http\Requests\area\AreaRequest;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use App\Traits\HttpResponses;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */

    use HttpResponses;

    public function __invoke(AreaRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(AreaFilter::class, ['queryParams' => array_filter($data)]);

        $areas = Area::with('department')->filter($filter)->paginate(10, ['*'], 'page', $data['page']);


        return AreaResource::collection($areas);
    }


    public function one($id){
        $area = Area::find($id);
        return $area;
    }
}
