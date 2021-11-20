<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class PatientRequest extends FormRequest
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
        return[
            'nid'=>'National ID',
            'date_of_birth'=>'Date Of Birth',
            'impairment'=>'required|string|max:200',
            'impairment1'=>'Impairment 02',
            'impairment2'=>'Impairment 03',
            'impairment3'=>'Impairment 04',
            'level'=>'Level of Complexity',
            'diagnosed_at'=>'Diagnosis Date',
            'diagnosed_on'=>'Diagnosied At',
        ];
    }

    public function rules()
    {
        return [
            'name'=>'required|string|min:5|max:80',
            'email'=>'nullable|email|string|min:4|max:120|unique:users,email',
            'phone'=>'nullable|string|size:10|unique:users,phone',
            'nid'=>'nullable|string|size:16|unique:users,nid',
            'date_of_birth'=>'date|required|before:'.Carbon::now(),
            'gender'=>'required|in:male,female|string',
            'address'=>'required|string|min:4|max:120',
            'impairment'=>'required|string|max:200',
            'impairment1'=>'nullable|string|max:200',
            'impairment2'=>'nullable|string|max:200',
            'impairment3'=>'nullable|string|max:200',
            'level'=>'required|string|in:Complex,High,Moderate,Low',
            'diagnosed_at'=>'date|required|before_or_equal:'.Carbon::now(),
            'diagnosed_on'=>'nullable',
        ];
    }
}
