<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return UserResource::collection(User::paginate());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(UserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    public function destroy($id)
    {
        return User::find($id)->delete();
    }

    public function update(User $user, UserRequest $request)
    {
        return $user->update($request->all());
    }
}
