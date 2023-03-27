<?php

namespace App\Http\Controllers\v1\area;

use App\Http\Controllers\Controller;
use App\Http\Requests\area\UpdateRequest;
use App\Models\Area;
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

    public function __invoke(UpdateRequest $request, Area $area)
    {
        $data = $request->validated();
        $result = $area->update($data);

        return $this->succes($result, 'Uraa', 200);
    }
}
