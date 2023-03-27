<?php

namespace App\Http\Controllers\v1\cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\cabinet\UpdateRequest;
use App\Http\Resources\CabinetResource;
use App\Models\Cabinet;
use App\Traits\HttpResponses;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     * @param UpdateRequest $request
     * @param cabinet
     * @return \Illuminate\Http\RedirectResponse
     */
    use HttpResponses;

    public function __invoke(UpdateRequest $request, Cabinet $cabinet)
    {
        $data = $request->validated();
        $result = $cabinet->update($data);

        return $this->succes($result, 'Uraa', 200);
    }
}
