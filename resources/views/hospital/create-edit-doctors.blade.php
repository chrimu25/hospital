@extends('layouts.back')
@section('title','New Doctor')
    
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex justify-content-between">
        <h5 class="mb-0">New Doctor</h5>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('hospital.doctors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name">
                        @error('name')
                         <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>    
                    <div class="col-md-4">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" id="phone">
                        @error('phone')
                        <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="speciality">Speciality</label>
                        <input type="text" name="speciality" value="{{old('speciality')}}" class="form-control @error('speciality') is-invalid @enderror" id="speciality">
                        @error('speciality')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="degree">Degree</label>
                        <select name="degree" class="form-control @error('degree') is-invalid @enderror" id="degree">
                            <option value="">Select Degree</option>
                            <option value="A2" {{old('degree')=="A2"?'selected':''}}>A2</option>
                            <option value="A1" {{old('degree')=="A1"?'selected':''}}>A1</option>
                            <option value="A0" {{old('degree')=="A0"?'selected':''}}>A0</option>
                            <option value="Masters" {{old('degree')=="Masters"?'selected':''}}>Masters</option>
                            <option value="Phd" {{old('degree')=="Phd"?'selected':''}}>Phd</option>
                        </select>
                        @error('degree')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="nid">National ID</label>
                        <input type="text" name="nid" value="{{old('nid')}}" class="form-control @error('nid') is-invalid @enderror" id="nid">
                        @error('nid')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" id="address">
                        @error('address')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male" {{old('gender')=="male"?'selected':''}}>Male</option>
                            <option value="female" {{old('gender')=="female"?'selected':''}}>Female</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="logo">Profile Picture</label>
                    <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror" id="logo">
                    @error('logo')
                    <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-sm btn-primary px-5" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection