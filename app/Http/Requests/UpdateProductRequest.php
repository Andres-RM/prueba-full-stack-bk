<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductRequest extends FormRequest
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
            'sku' =>        'required|string|unique:products|max:160',
            'name' =>       'required|string|max:45',
            'stock' =>      'required|numeric',
            'price' =>      'required|numeric',
            'description'=> 'nullable|string'
        ];
    }
}
