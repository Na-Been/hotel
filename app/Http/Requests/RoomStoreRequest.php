<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomStoreRequest extends FormRequest
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
        if(request()->feature_image){
            $rules += [
            'feature_image'=>'required',
            ];
        }
        if (request()->room_images){
            $rules +=[
            'room_images'=>'required'
            ];
        }
        $rules += [
            'room_no'=>'required|unique:rooms,id,'.request()->route()->room,
            'room_type'=>'required',
            'room_slug'=>'required|unique:rooms,'.request()->route()->room,
            'ac'=>'required',
            'meal'=>'required',
            'cancel_charge'=>'required',
            'rent_per_night'=>'required',
            'room_details'=>'required'
        ];
        return $rules;
    }
}
