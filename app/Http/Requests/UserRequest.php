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
        
      
        if(!$id = request()->hidden_id)
             $val ="required|min:6|max:40";
        else
            $val = null;
    
        return [
            'name'=>'required|min:3|max:100|',
            'email'=>"required|unique:users,email,{$id}",
            'password'=>"{$val}"
        ];
    }
}
