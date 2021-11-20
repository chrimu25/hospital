<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Requests\PrescriptionRequest;
use App\Models\Disease;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorsController extends Controller
{
    public function index()
    {
        return view('doctor.index');
    }

    public function patients()
    {
        return view('doctor.patients');
    }

    public function create()
    {
        $hospitals = User::where('role','Hospital')->select('id','hospital_name')->orderBy('hospital_name')->get();
        return view('doctor.insert',compact('hospitals'));
    }

    public function store(PatientRequest $request)
    {
        $patient = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'date_of_birth'=>$request->date_of_birth,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'role'=>'Patient',
            'nid'=>$request->nid??$request->nid,
            'password'=>Hash::make('Patient.me')
        ]);

        Disease::create([
            'user_id'=>$patient->id,
            'impairement'=>$request->impairment,
            'impairement1'=>$request->impairment1??$request->impairment1,
            'impairement2'=>$request->impairment2??$request->impairment2,
            'impairement3'=>$request->impairment3??$request->impairment3,
            'level'=>$request->level,
            'diagnosed_at'=>$request->diagnosed_at??$request->diagnosed_at,
            'diagnosed_on'=>$request->diagnosed_on,
        ]);

        return back()->with('success','Patient Inserted Successfully!');
    }

    public function show(User $patient)
    {
        return view('doctor.single-patient',compact('patient'));
    }

    public function prescription(PrescriptionRequest $request)
    {
        Prescription::create([
            'patient'=>$request->patient,
            'hospital'=>Auth::user()->hospital_id,
            'doctor'=>Auth::id(),
            'comment'=>$request->comment,
            'valid_until'=>$request->valid_until,
        ]);

        return back()->with('success','Prescription Created Successfully');
    }
}
