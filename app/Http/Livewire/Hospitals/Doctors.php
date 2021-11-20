<?php

namespace App\Http\Livewire\Hospitals;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Doctors extends Component
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
        $doctor = User::findOrFail($id);
        if ($doctor->profile_pic) {
            Storage::disk('public')->delete($doctor->profile_pic);
        }
        $doctor->delete();
    }

    public function close($id)
    {
        $doctor = User::findOrFail($id);
        $doctor->update(['status'=>'dormant']);
    }

    public function active($id)
    {
        $doctor = User::findOrFail($id);
        $doctor->update(['status'=>'active']);
    }

    public function render()
    {
        $doctors = User::where('role','Doctor')->where('hospital_id',Auth::id())
                        ->search(trim($this->searchKey))
                        ->orderByDesc('created_at')
                        ->paginate($this->perPage);
        return view('livewire.hospitals.doctors', compact('doctors'));
    }
}
