<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function list(Request $request)
    {
        $users = User::query()->paginate();

        return response()->json($users);
    }
}