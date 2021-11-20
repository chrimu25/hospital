@extends('layouts.back')
@section('title','Doctors')
    
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex justify-content-between w-100 mb-1">
        <h5>Doctors</h5>
        <a href="{{route('hospital.doctors.create')}}" class="float-right btn btn-sm btn-primary">New Doctor</a>
    </div>
</div>
<div class="row">
    @livewire('hospitals.doctors')
</div>
@endsection