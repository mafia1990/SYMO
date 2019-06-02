<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                    'name'=>'required|max:50|min:3',
                    'gender'=>'required|in:0,1',
                    'status'=>'required|in:0,1,2',
                    'email'=>'required|email|max:256|unique:users',
                    'password'=>'required|max:64|min:6|confirmed',
                    'mobile'=>'required|max:16|min:6',
                    'phone'=>'required|max:16|min:6',
                    'avatar'=>'max:1000|mimes:png,jpg,jpeg'
                ];
            }
            case 'PUT':
            case 'PATCH':{
                if($this->has('statusChange')) {
                    return [ 'statusChange'=>'required'];
                }
                return [
                    'email' => 'required|max:256',
                    'name'=>'required|max:50|min:3',
                    'gender'=>'required|in:0,1',
                    'status'=>'required|in:0,1,2',
                    'mobile'=>'required|max:16|min:6',
                    'phone'=>'required|max:16|min:6',
                    'avatar'=>'max:1000|mimes:png,jpg,jpeg'
                ];
            }



        }


    }
}
