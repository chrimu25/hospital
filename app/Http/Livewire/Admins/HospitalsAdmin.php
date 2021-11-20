<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class HospitalsAdmin extends Component
{
    use WithPagination;
    public $paginationTheme = "bootstrap";
    public $perPage = 10, $searchKey = '';
    public $queryString = [
        'perPage'=>['except'=>10],
        'searchKey'=>['except'=>''],
    ];

    public function delete($id)
    {
        $hospital = User::findOrFail($id);
        if ($hospital->logo) {
            Storage::disk('public')->delete($hospital->logo);
        }
        $hospital->delete();
    }

    public function close($id)
    {
        $hospital = User::findOrFail($id);
        $hospital->update(['status'=>'dormant']);
    }

    public function active($id)
    {
        $hospital = User::findOrFail($id);
        $hospital->update(['status'=>'active']);
    }

    public function render()
    {
        $admins = User::where('role','Hospital')
                        ->search(trim($this->searchKey))
                        ->orderByDesc('created_at')
                        ->paginate($this->perPage);
        return view('livewire.admins.hospitals-admin', compact('admins'));
    }
}
