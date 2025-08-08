<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user): UserResource
    {
        //dump(UserResource::make($user));
        //Return an array ['id' => $this->id,'name' => $this->name,...]; <= Resource
        $array_dto = UserResource::make($user);
        return $array_dto;
    }
}
