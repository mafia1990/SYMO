<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
                    return [
                        'address' => 'required|max:256',
                        'name' => 'required|max:128',
                        'phone' => 'required|max:16',
                        'mobile' => 'max:16',
                        'photo' => 'max:1000|mimes:png,jpg,jpeg',
                        'description' => 'max:256',
                        'status' => 'required|in:0,1,2',
                        'seller' => 'required',

                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'address' => 'required|max:256',
                        'name' => 'required|max:128',
                        'phone' => 'required|max:16',
                        'mobile' => 'max:16',
                        'photo' => 'max:1000|mimes:png,jpg,jpeg',
                        'description' => 'max:256',
                        'status' => 'required|in:0,1,2',
                        'seller' => 'required',
                    ];
                }
        }
    }
}
