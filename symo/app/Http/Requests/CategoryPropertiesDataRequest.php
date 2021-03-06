<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPropertiesDataRequest extends FormRequest
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
            case 'POST':{
                return [
                    'title'=>'required|max:50|min:2',
                    'category_id'=>'required|exists:categories,id',
                    'categoryproperties_id'=>'required|exists:category_properties,id',
                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'title'=>'required|max:50|min:2',
                    'category_id'=>'required|exists:categories,id',
                    'categoryproperties_id'=>'required|exists:category_properties,id',
                ];
            }



        }
    }
}
