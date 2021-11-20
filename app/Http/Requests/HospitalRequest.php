<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalRequest extends FormRequest
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
            'name'=>'Person Of Contact',
            'email'=>'Email Address',
            'phone'=>'Phone Number',
            'hospital'=>'Hospital Name',
            'head'=>'Director',
            'address'=>'Address',
            'website'=>'Website',
            'twitter'=>'Twitter Handler',
            'linkedin'=>'LinkedIn Account',
            'instagram'=>'Instagram Account',
            'facebook'=>'Facebook Page',
            'logo'=>'Logo',
        ];
    }
    
    public function rules()
    {
        return [
            'name'=>'required|bail|string|min:5|max:90',
            'email'=>'email|required|string|unique:users,email',
            'phone'=>'string|required|size:10|unique:users,phone',
            'hospital'=>'required|string|unique:users,hospital_name,|min:3|max:90',
            'head'=>'required|string|min:5|max:120',
            'address'=>'required|string|min:4|max:120',
            'website'=>'nullable|url|min:4|max:120',
            'twitter'=>'nullable|unique:users,twitter|min:3|max:100',
            'linkedin'=>'nullable|unique:users,linkedin|min:3|max:100',
            'instagram'=>'nullable|unique:users,instagram|min:3|max:100',
            'facebook'=>'nullable|unique:users,facebook|min:3|max:100',
            'logo'=>'image|required|mimes:jpg,png,jpeg,web|max:700',
        ];
    }
}
