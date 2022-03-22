<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class TransportStoreRequest extends FormRequest
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
        if (request()->vehicle_image) {
            $rules += [
                'vehicle_image' => 'required',
            ];
        }
        $rules+=[
          'model_name'=>'required',
          'model_number'=>'required',
          'purchase_date'=>'required|date|date_format:Y-m-d',
          'expire_date'=>'required|date|date_format:Y-m-d',
          'vehicle_type'=>'required',
          'fuel_type'=>'required',
          'vehicle_number'=>'required',
          'driver_name'=>'required',
          'seat_capacity'=>'required',
          'details'=>'required'
        ];
        return $rules;
    }
}
