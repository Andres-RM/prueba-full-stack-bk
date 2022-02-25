<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthCotroller extends Controller
{
    //

    public function login(LoginRequest $request): JsonResponse
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $user = User::query()->where('username', '=', $username)
            ->where('status', 1)
            ->first();


        if ($user) {
            if (Hash::check($password, $user->password)) {
                $token = $user->createToken('User Access Token by'. $user->email)->accessToken;
                $this->addResponseElement('email',$user->email);
                $this->addResponseElement('status','success');
                $this->addResponseElement('token', $token);

                return response()->json($this->getResponseFormat());
            } else {
                $this->messageResponseError = 'Invalid Credentials';
            }
        } else {
            $this->messageResponseError = 'Invalid Credentials';
        }

        return response()->json($this->getErrors(),400);


    }
}
