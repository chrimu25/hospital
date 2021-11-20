@extends('layouts.back')

@section('title','View: '.$patient->name)
    
@section('content')
<div class="row mb-3">
    <div class="col-lg-3">
        <div class="card border-0 rounded shadow p-4">
            <h5 class="mb-0">Personal Details :</h5>
            <div class="mt-4">
                <div class="d-flex align-items-center">
                    <div class="flex-1">
                        <h6 class="text-primary mb-0">Name :</h6>
                        {{$patient->name}}
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <div class="flex-1">
                        <h6 class="text-primary mb-0">date Of Birth :</h6>
                        <span class="text-muted">{{$patient->date_of_birth}}</span>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <div class="flex-1">
                        <h6 class="text-primary mb-0">Gender :</h6>
                        <span class="text-muted">{{$patient->gender}}</span>
                    </div>
                </div>
                @if ($patient->email) 
                <div class="d-flex align-items-center mt-3">
                    <div class="flex-1">
                        <h6 class="text-primary mb-0">Email :</h6>
                        <a href="mailto:{{$patient->email}}" class="text-muted">{{$patient->email}}</a>
                    </div>
                </div>
                @endif
                @if ($patient->phone) 
                <div class="d-flex align-items-center mt-3">
                    <div class="flex-1">
                        <h6 class="text-primary mb-0">Phone Number :</h6>
                        <a href="tel:{{$patient->phone}}" class="text-muted">{{$patient->phone}}</a>
                    </div>
                </div>
                @endif
                @if ($patient->nid) 
                <div class="d-flex align-items-center mt-3">
                    <div class="flex-1">
                        <h6 class="text-primary mb-0">National ID :</h6>
                        <span class="text-muted">{{$patient->nid}}</span>
                    </div>
                </div>
                @endif
                <div class="d-flex align-items-center mt-3">
                    <div class="flex-1">
                        <h6 class="text-primary mb-0">Address :</h6>
                        <span class="text-muted">{{$patient->address}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end col-->

    <div class="col-lg-5">
        <div class="card border-0 rounded shadow p-4">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Recent Prescriptions {{$patient->prescriptions->count()}}:</h5>
            </div>
            {{-- @foreach ($patient->prescriptions as $item)
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center mt-4">
                    <div class="flex-1 ms-2">
                        <h6 class="mb-0 text-dark">{{$item->comment}}</h6>
                        <small class="text-muted">Designer</small>
                    </div>
                </div>

                <a href="profile.html" class="text-primary"><i class="ti ti-eye"></i></a>
            </div>
            @endforeach --}}
        </div>
    </div>
    
    <div class="col-md-4 mt-4">
        <div class="card border-0 shadow rounded p-4">
            <h4 class="mb-2">Prescript {{$patient->gender=="male"?'him':'her'}}:</h4>
            <form action="{{ route('doctor.ptients.prescript') }}" method="POST">
                @csrf
                <input type="hidden" name="patient" value="{{$patient->id}}">
                <div class="form-group">
                    <label for="">Prescription</label>
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" rows="5"
                    >{{old('comment')}}</textarea>
                    @error('comment')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="valid_until">Valid Until</label>
                    <input type="date" name="valid_until" value="{{old('valid_until')}}" class="form-control 
                    @error('valid_until') is-invalid @enderror" id="valid_until">
                    @error('valid_until')
                    <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-sm btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-center bg-white mb-0">
                <thead>
                    <tr>
                        <th class="border-bottom p-3">#</th>
                        <th class="text-center border-bottom p-3">Impairment</th>
                        <th class="text-center border-bottom p-3">Impairment 2</th>
                        <th class="text-center border-bottom p-3">Impairment 3</th>
                        <th class="text-center border-bottom p-3">Complexity</th>
                        <th class="text-center border-bottom p-3">Diagnosied At</th>
                        <th class="text-center border-bottom p-3">Diagnosed On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patient->impairement()->get() as $patient)
                        <tr>
                            <th class="p-3">{{$loop->iteration}}</th>
                            <td class="text-center p-3">{{$patient->impairement}}</td>
                            <td class="text-center p-3">{{$patient->impairement1}}</td>
                            <td class="text-center p-3">{{$patient->impairement2}}</td>
                            <td class="text-center p-3">{{$patient->level}}</td>
                            <td class="text-center p-3">{{$patient->diagnosed_at}}</td>
                            <td class="text-center p-3">{{$patient->hospital->hospital_name}}</td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            <h4 class="text-center">No Diagnosis Yet</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection