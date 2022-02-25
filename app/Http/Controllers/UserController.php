<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function list(Request $request): JsonResponse
    {
        $users = User::query()->paginate();

        return response()->json($users);
    }

    public function store(UserRequest $request): JsonResponse
    {
        $user = User::query()->create($request->all());

        return response()->json($user);
    }

    public function getUser(User $user, Request $request)
    {
        return response()->json($user);
    }

    public function edit(User $user, UserUpdateRequest $request)
    {
        $user->username = $request->get('username');
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->date = $request->get('date');

        if ($request->get('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        $user->save();

        return response()->json($user, 201);
    }

    public function disable(User $user)
    {
        $user->status = 0;

        $user->save();

        return response()->json($user);
    }

    public function enable(User $user)
    {
        $user->status = 1;

        $user->save();

        return response()->json($user);
    }
}
