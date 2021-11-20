<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HospitalController extends Controller
{
    public function index()
    {
        return view('hospital.index');
    }

    public function docs()
    {
        return view('hospital.doctors');
    }

    public function doctors()
    {
        return view('hospital.create-edit-doctors');
    }

    public function store(DoctorsRequest $request)
    {
        if ($request->hasFile('logo')) {
            $imgName = Str::slug($request->name).time().'.'.$request->logo->extension();
            $logo = $request->logo->storeAs('Hosptals/Doctors',$imgName,'public');
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'degree'=>$request->degree,
            'nid'=>$request->nid,
            'speciality'=>$request->speciality,
            'profile_pic'=>$logo,
            'role'=>'Doctor',
            'hospital_id'=>Auth::id(), 
            'password'=>Hash::make('Doctors.me')
        ]);

        return back()->with('success','Doctor Inserted Successfully!');
    }
}
