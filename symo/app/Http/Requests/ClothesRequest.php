<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClothesRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                {
                    $rules = [
                        'title' => 'required|max:50|min:3',
                        'category_id' => 'required|exists:categories,id',
                        'shop_id' => 'required|exists:shops,id',
                        'pcats' => 'required|exists:category_property_data,id',
                        'sex' => 'required|in:0,1,2',
                        'color' => 'required|exists:colors,id',
                        'status' => 'required|in:0,1,2',
                        'comment' => 'max:200',
                        'pic' => 'required'
                    ];

                    return $rules;
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|max:50|min:3',
                        'category_id' => 'required|exists:categories,id',
                        'shop_id' => 'required|exists:shops,id',
                        'pcats' => 'required|exists:category_property_data,id',
                        'sex' => 'required|in:0,1,2',
                        'status' => 'required|in:0,1,2',
                        'color' => 'required|exists:colors,id',
                        'comment' => 'max:200',
                        'pic' => 'required'];
                }
        }
        return [];
    }
}
