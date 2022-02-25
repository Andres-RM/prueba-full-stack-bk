<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'username' => [
                'required',
                'string',
                'max:160',
                Rule::unique('products')->ignore($this->products->id),
            ],
            'name' =>       'required|string|max:45',
            'stock' =>      'required|numeric',
            'price' =>      'required|numeric',
            'description'=> 'nullable|string'
        ];
    }
}
