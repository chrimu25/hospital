<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function admins()
    {
        return view('admin.hospital_admin');
    }

    public function create()
    {
        return view('admin.insert-edit-admin');
    }


    public function store(HospitalRequest $request)
    {
        if ($request->hasFile('logo')) {
            $imgName = Str::slug($request->hospital).time().'.'.$request->logo->extension();
            $logo = $request->logo->storeAs('Hosptals',$imgName,'public');
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'role'=>'Hospital',
            'hospital_name'=>$request->hospital,
            'head'=>$request->head,
            'logo'=>$logo,
            'website'=>$request->website,
            'twitter'=>$request->twitter?$request->twitter:null,
            'linkedin'=>$request->linkedin?$request->linkedin:null,
            'facebook'=>$request->instagram?$request->instagram:null,
            'instagram'=>$request->facebook?$request->facebook:null,
            'password'=>Hash::make('Secret.me'),
        ]);

        return back()->with('success','Hospital Inserted Successfully!');
    }
}
