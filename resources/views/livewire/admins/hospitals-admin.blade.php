<div class="table-responsive shadow rounded-bottom" data-simplebar>
    <table class="table table-center bg-white mb-0">
        <thead>
            <tr>
                <th class="border-bottom p-3">#</th>
                <th class="text-center border-bottom p-3">Hospital</th>
                <th class="text-center border-bottom p-3">Contact</th>
                <th class="text-end border-bottom p-3">Status</th>
                <th class="text-end border-bottom p-3">Options</th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
                <tr>
                    <th class="p-3">{{$loop->iteration}}</th>
                    <td class="text-center p-3">
                        <div class="d-flex align-items-center">
                            <img src="{{Storage::url($admin->logo)}}" class="avatar avatar-ex-small rounded-circle shadow" alt="">
                            <div class="d-flex flex-column align-items-start">
                                <span class="ms-2">{{$admin->hospital_name}}</span>
                                <span class="ms-2">{{$admin->head}}</span>
                            </div>
                        </div>
                    </td>
                    <td class="text-center p-3 d-flex flex-column align-items-start">
                        <span>{{$admin->name}}</span>
                        <div>
                            <span><a href="mailto:{{$admin->email}}">{{$admin->email}}</a></span>
                            <span class="mx-1">|</span>
                            <span><a href="tel:{{$admin->phone}}">{{$admin->phone}}</a></span>
                        </div>
                    </td>
                    <td class="text-center p-3">
                        <div class="">
                            {{$admin->status}}
                        </div>
                    </td>
                    <td class="text-end p-3">
                        @if($admin->status=="active")
                        <button wire:click="close({{$admin->id}})" wire:loading.attr="disabled" title="Disable Account" 
                        class="btn btn-sm btn-warning"><i class="ti ti-trash"></i></button>
                        @endif
                        @if($admin->status=="dormant")
                        <button wire:click="active({{$admin->id}})" wire:loading.attr="disabled" title="UnblockThis Account" 
                        class="btn btn-sm btn-primary"><i class="ti ti-recycle"></i></button>
                        @endif
                        <button wire:click="delete({{$admin->id}})" wire:loading.attr="disabled" title="UnblockThis Account" 
                        class="btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    <h4 class="text-center">No Admins Yet</h4>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
