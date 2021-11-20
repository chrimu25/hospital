@extends('layouts.back')
@section('title','Patients')
    
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex justify-content-between w-100 mb-1">
        <h5>Patients List</h5>
        <a href="{{route('doctor.ptients.create')}}" class="float-right btn btn-sm btn-primary">New Patient</a>
    </div>
</div>
<div class="row">
    @livewire('doctors.patients')
</div>
@endsection