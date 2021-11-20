@extends('layouts.back')
@section('title','Hospital Admins')
    
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex justify-content-between w-100 mb-1">
        <h5>Hospital Admins</h5>
        <a href="{{route('admin.admins.create')}}" class="float-right btn btn-sm btn-primary">Insert New Hospital Manager</a>
    </div>
</div>
<div class="row">
    @livewire('admins.hospitals-admin')
</div>
@endsection