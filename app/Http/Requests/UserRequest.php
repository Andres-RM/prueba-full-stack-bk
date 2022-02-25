<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|unique:users|max:45',
            'email' => 'required|email|unique:users|max:195',
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:25',
            'password' => 'required|string|min:6|max:20'
        ];
    }
}
