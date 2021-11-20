<div class="table-responsive shadow rounded-bottom" data-simplebar>
    <table class="table table-center bg-white mb-0">
        <thead>
            <tr>
                <th class="border-bottom p-3">#</th>
                <th class="text-left border-bottom p-3">Name</th>
                <th class="text-left border-bottom p-3">Contact</th>
                <th class="text-center border-bottom p-3">Impairment</th>
                <th class="text-center border-bottom p-3">Options</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $patient)
                <tr>
                    <th class="p-3">{{$loop->iteration}}</th>
                    <td class="text-center p-3">
                        <div class="d-flex flex-column align-items-start">
                            <span>{{$patient->name}}</span>
                            <span>{{$patient->date_of_birth}}</a></span>
                        </div>
                    </td>
                    <td class="text-center p-3">
                        <div class="d-flex flex-column align-items-start">
                            <span><a href="mailto:{{$patient->email}}">{{$patient->email}}</a></span>
                            <span><a href="tel:{{$patient->phone}}">{{$patient->phone}}</a></span>
                        </div>
                    </td>
                    <td class="text-center p-3">{{$patient->impairement?$patient->impairement->impairement:''}}</td>
                    <td class="text-end p-3">
                        <a href="{{ route('doctor.ptients.show',$patient->id) }}"  wire:loading.attr="disabled" title="View" 
                        class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">
                    <h4 class="text-center">No patients Yet</h4>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
