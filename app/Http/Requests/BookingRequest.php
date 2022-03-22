<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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

        $rules += [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'nationality' => 'required',
            'arrival_date' => 'required',
            'check_out' => 'required',
            'number_of_booked_room' => 'required',
            'adult_number' => 'required',
        ];

        if (request()->has('ac_or_non')) {
            $rules += [
                'ac_or_non' => 'required'
            ];
        }

        if (request()->has('room_type')) {
            $rules += [
                'room_type' => 'required'
            ];

        }
        return $rules;
    }
}
