<?php

namespace App\Http\Controllers\v1\user;
use App\Http\Controllers\Controller;

use App\Http\Filters\UserFilter;

use App\Http\Requests\user\UserRequest;

use App\Http\Resources\UserPermissions;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */

    use HttpResponses;

    public function __invoke(UserRequest $request)
    {

        $data = $request->validated();


        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);

        $user = User::with('department')->filter($filter)->paginate(10, ['*'], 'page', $data['page']);

        return UserResource::collection($user);
    }

    public function one(){
        $permissions = auth()->user();
        return new UserPermissions($permissions);
    }
}
