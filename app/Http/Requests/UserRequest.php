<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $req = \Request::route();
        if($req->action['as'] == "sendEmail"){
            $validate = [
                'email' => 'required|email|unique:users'
            ];
        }else if($req->action['as'] == "login"){
            $validate = [
                'email' => 'required|email',
                'password' => 'required',
            ];
        }else{
            $validate = [
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'required'
            ];
        }

        return $validate;
    }
}
