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
                     $rules= [
                        'title' => 'required|max:50|min:3',
                        'category' => 'required|exists:categories,id',
                        'pcats' => 'required|exists:category_property_data,id',
                        'color' => 'required|exists:colors,id',

                        'comment' => 'max:200'
                    ];

                    $nbr = count($this->file('pic')) - 1;
                    foreach(range(0, $nbr) as $index) {
                       if($index==0) $rules['pic.' . $index] = 'required|max:1000|mimes:png,jpg,jpeg';
                        else $rules['pic.' . $index] = 'max:1000|mimes:png,jpg,jpeg';
                    }
                    return $rules;
                }
            case 'PUT':
            case 'PATCH':
                {
                  return [];
                }
        }
        return [];
    }
}
