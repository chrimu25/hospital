<div class="table-responsive shadow rounded-bottom" data-simplebar>
    <table class="table table-center bg-white mb-0">
        <thead>
            <tr>
                <th class="border-bottom p-3">#</th>
                <th class="text-left border-bottom p-3">Name</th>
                <th class="text-left border-bottom p-3">Speciality</th>
                <th class="text-center border-bottom p-3">Address</th>
                <th class="text-center border-bottom p-3">Options</th>
            </tr>
        </thead>
        <tbody>
            @forelse($doctors as $doctor)
                <tr>
                    <th class="p-3">{{$loop->iteration}}</th>
                    <td class="text-center p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{Storage::url($doctor->profile_pic)}}" class="avatar avatar-ex-small rounded-circle shadow" alt="">
                            <div class="d-flex flex-column align-items-start">
                                <span class="ms-2">{{$doctor->name}}</span>
                                <div>
                                    <span><a href="mailto:{{$doctor->email}}">{{$doctor->email}}</a></span>
                                    <span class="mx-1">|</span>
                                    <span><a href="tel:{{$doctor->phone}}">{{$doctor->phone}}</a></span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center p-3 d-flex flex-column align-items-start">
                        <span>{{$doctor->degree}} in</span>
                        <span>{{$doctor->speciality}}</span>
                    </td>
                    <td class="text-center p-3">{{$doctor->address}}</td>
                    <td class="text-end p-3">
                        @if($doctor->status=="active")
                        <button wire:click="close({{$doctor->id}})" wire:loading.attr="disabled" title="Disable Account" 
                        class="btn btn-sm btn-warning"><i class="ti ti-trash"></i></button>
                        @endif
                        @if($doctor->status=="dormant")
                        <button wire:click="active({{$doctor->id}})" wire:loading.attr="disabled" title="UnblockThis Account" 
                        class="btn btn-sm btn-success"><i class="ti ti-recycle"></i></button>
                        @endif
                        <a href="#"  wire:loading.attr="disabled" title="View" 
                        class="btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    <h4 class="text-center">No Doctors Yet</h4>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
