<?php

namespace App\Http\Controllers\v1\speciality;

use App\Http\Controllers\Controller;
use App\Http\Requests\speciality\UpdateRequest;
use App\Models\Speciality;
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

    public function __invoke(UpdateRequest $request, Speciality $speciality)
    {
        $data = $request->validated();
        $result = $speciality->update($data);

        return $this->succes($result, 'Uraa', 200);
    }
}
