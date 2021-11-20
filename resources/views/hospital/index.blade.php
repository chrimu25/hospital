@extends('layouts.back')
@section('title','DashBoard')
    
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h6 class="text-muted mb-1">Welcome back, {{Auth::user()->name}}!</h6>
        <h5 class="mb-0">Hospital Dashboard</h5>
    </div>
</div>

@endsection