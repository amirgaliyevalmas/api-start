<?php

namespace App\Http\Resources;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
              'data' => [  'id' => (string)$this->id,
                'email' => $this->email,
                'name' => $this->name,
                'department' => $this->department,
                'speciality' => $this->speciality,
                'area' => $this->areas,
                'role' => $this->getRoleNames(),
                'permissions' => $this->getAllPermissions(),
                  ],
                'current_user_roles' => Auth::user()->getRoleNames(),
                'current_user_permissions' => Auth::user()->getAllPermissions()


        ];
    }
}
