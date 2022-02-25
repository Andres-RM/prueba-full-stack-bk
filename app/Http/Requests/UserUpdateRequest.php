<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:195',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'username' => [
                'required',
                'string',
                'max:195',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:25',
            'password' => 'nullable|string|min:6|max:20'
        ];
    }
}
