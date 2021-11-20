@extends('layouts.back')
@section('title','Insert New Manager')
    
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex justify-content-between">
        <h5 class="mb-0">New Hospital Manager</h5>
    </div>
</div>
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 mb-2">
                        <label for="name">Person Of Contact</label>
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
                        <label for="hospital">Hospital Name</label>
                        <input type="text" name="hospital" value="{{old('hospital')}}" class="form-control @error('hospital') is-invalid @enderror" id="hospital">
                        @error('hospital')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="head">CEO/MD</label>
                        <input type="text" name="head" value="{{old('head')}}" class="form-control @error('head') is-invalid @enderror" id="head">
                        @error('head')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="website">Website</label>
                        <input type="url" name="website" value="{{old('website')}}" class="form-control @error('website') is-invalid @enderror" id="website">
                        @error('website')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="twitter">Twitter Handler</label>
                        <input type="text" name="twitter" value="{{old('twitter')}}" class="form-control @error('twitter') is-invalid @enderror" id="twitter">
                        @error('twitter')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" name="linkedin" value="{{old('linkedin')}}" class="form-control @error('linkedin') is-invalid @enderror" id="linkedin">
                        @error('linkedin')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" value="{{old('instagram')}}" class="form-control @error('instagram') is-invalid @enderror" id="instagram">
                        @error('instagram')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" value="{{old('facebook')}}" class="form-control @error('facebook') is-invalid @enderror" id="facebook">
                        @error('facebook')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" id="address">
                    @error('address')
                    <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="logo">Logo</label>
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