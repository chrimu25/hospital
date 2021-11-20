<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorsRequest extends FormRequest
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
            'name'=>'Full Name',
            'email'=>'Email Address',
            'phone'=>'Phone Number',
            'nid'=>'National ID',
            'address'=>'Address',
            'gender'=>'Gender',
            'logo'=>'profile Picture',
        ];
    }
    
    public function rules()
    {
        return [
            'name'=>'bail|required|string|min:5|max:90',
            'email'=>'email|required|string|unique:users,email|min:5|max:90',
            'phone'=>'required|string|size:10|unique:users,phone',
            'speciality'=>'required|string',
            'degree'=>'required|string|in:A2,A1,A0,Masters,Phd',
            'nid'=>'required|size:16|string',
            'address'=>'required|string',
            'gender'=>'required|in:male,female',
            'logo'=>'image|nullable|mimes:png,jpg,webp|max:800',
        ];
    }
}
