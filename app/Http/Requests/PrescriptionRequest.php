<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class PrescriptionRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'comment'=>'Prescription',
            'valid_until'=>'Expiry Date'
        ];
    }

    public function rules()
    {
        return [
            'comment'=>'required|string|max:10000',
            'valid_until'=>'date|required|after:'.Carbon::now()
        ];
    }
}
