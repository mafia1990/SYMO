<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SeasonRequest extends FormRequest
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

                ];
            }
            case 'PUT':
            case 'PATCH':{
                return [
                    'title'=>['required','max:50','min:2',Rule::unique('seasons','name')],

                ];
            }



        }
    }
}
