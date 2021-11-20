@extends('layouts.back')
@section('title','Insert New Patient')
    
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex justify-content-between">
        <h5 class="mb-0">Insert New Patient</h5>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('doctor.ptients.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mb-2">
                        <label for="name">Patient Name <span class="text-danger">*</span></label>
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
                    <div class="col-md-5">
                        <label for="nid">National ID</label>
                        <input type="text" name="nid" value="{{old('nid')}}" class="form-control @error('nid') is-invalid 
                        @enderror" id="nid">
                        @error('nid')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="date_of_birth">Date Of Birth <span class="text-danger">*</span></label>
                        <input type="date" name="date_of_birth" value="{{old('date_of_birth')}}" 
                        class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth">
                        @error('date_of_birth')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="gender">Gender <span class="text-danger">*</span></label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male" {{old('gender')=="male"?'selected':''}}>Male</option>
                            <option value="female" {{old('gender')=="female"?'selected':''}}>Female</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="address">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid 
                        @enderror" id="address">
                        @error('address')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-3">
                        <label for="impairment">Impairment 1 <span class="text-danger">*</span></label>
                        <input type="text" name="impairment" value="{{old('impairment')}}" class="form-control 
                        @error('impairment') is-invalid @enderror" id="impairment">
                        @error('impairment')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="impairment1">Impairment 2</label>
                        <input type="text" name="impairment1" value="{{old('impairment1')}}" class="form-control 
                        @error('impairment1') is-invalid @enderror" id="impairment1">
                        @error('impairment1')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="impairment2">Impairment 3</label>
                        <input type="text" name="impairment2" value="{{old('impairment2')}}" class="form-control 
                        @error('impairment2') is-invalid @enderror" id="impairment2">
                        @error('impairment2')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="impairment3">Impairment 4</label>
                        <input type="text" name="impairment3" value="{{old('impairment3')}}" class="form-control 
                        @error('impairment3') is-invalid @enderror" id="impairment3">
                        @error('impairment3')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-4">
                        <label for="level">Level Of Complexity <span class="text-danger">*</span></label>
                        <select name="level" class="form-control @error('level') is-invalid @enderror" id="level">
                            <option value="">Select level</option>
                            <option value="Complex" {{old('level')=="Complex"?'selected':''}}>Complex</option>
                            <option value="High" {{old('level')=="High"?'selected':''}}>High</option>
                            <option value="Moderate" {{old('level')=="Moderate"?'selected':''}}>Moderate</option>
                            <option value="Low" {{old('level')=="Low"?'selected':''}}>Low</option>
                        </select>
                        @error('level')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="diagnosed_at">Diagnosed At <span class="text-danger">*</span></label>
                        <input type="date" name="diagnosed_at" value="{{old('diagnosed_at')}}" 
                        class="form-control @error('diagnosed_at') is-invalid @enderror" id="diagnosed_at">
                        @error('diagnosed_at')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="diagnosed_on">Diagnosed On</label>
                        <select name="diagnosed_on" class="form-control @error('diagnosed_on') is-invalid @enderror" 
                        id="diagnosed_on">
                            <option value="">Select Hospital</option>
                            @foreach ($hospitals as $item)
                            <option value="{{$item->id}}" {{old('diagnosed_on')==$item->id?'selected':''}}
                                >{{$item->hospital_name}}</option>
                            @endforeach
                        </select>
                        @error('level')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-sm btn-primary px-5" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection