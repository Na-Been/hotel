<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffStoreRequest extends FormRequest
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
        $rules = [];
        if (request()->image ) {
            $rules += [
                'image' => 'required',
            ];
        }
        $rules += [
            'name'=>'required',
            'email' => 'required|unique:staff,email,'.request()->route()->staff,
            'joining_date' => 'required|date|date_format:Y-m-d',
            'role' => 'required',
            'gender' => 'required',
            'number' => 'required',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
            'education' => 'required'
        ];
        return $rules;
    }
}
