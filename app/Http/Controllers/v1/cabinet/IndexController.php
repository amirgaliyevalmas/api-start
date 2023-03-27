<?php

namespace App\Http\Controllers\v1\cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\CabinetResource;
use App\Models\Cabinet;
use App\Traits\HttpResponses;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */

    use HttpResponses;

    public function __invoke()
    {
        $cabinet = Cabinet::paginate(10);

        return CabinetResource::collection($cabinet);
    }

    public function all(){
        $cabinet = Cabinet::all();
        return CabinetResource::collection($cabinet);
    }

    public function getCabinet($id){
        $cabinet = Cabinet::find($id);
        return $cabinet;
    }
}
