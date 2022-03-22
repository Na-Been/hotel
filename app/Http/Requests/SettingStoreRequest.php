<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
        $rules =[];
        if(request()->logo){
            $rules +=[
                'logo'=>'required'
            ];
        }
        $rules +=[
            'dashboard_title'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required'
        ];
        return $rules;
    }
}
