<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'sex'=>'required|in:0,1,2',
                    'image'=>'required|max:1000|mimes:png,jpg,jpeg'
                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'title'=>'required|max:50|min:2',
                    'sex'=>'required|in:0,1,2',
                    'image'=>'max:1000|mimes:png,jpg,jpeg'
                ];
            }



        }
    }
}
