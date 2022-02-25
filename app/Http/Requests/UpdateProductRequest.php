<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku' => [
                'required',
                'string',
                'max:160',
                Rule::unique('products')->ignore($this->product->id),
            ],
            'name' =>       'required|string|max:45',
            'stock' =>      'required|numeric',
            'price' =>      'required|numeric',
            'description'=> 'nullable|string'
        ];
    }
}
