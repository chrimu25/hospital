<?php

namespace App\Http\Livewire\Doctors;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Patients extends Component
{
    use WithPagination;
    public $paginationTheme = "bootstrap";
    public $perPage = 10, $searchKey = '';
    public $queryString = [
        'perPage'=>['except'=>10],
        'searchKey'=>['except'=>''],
    ];

    public function render()
    {
        $patients = User::with('impairement')->where('role','Patient')
                        ->search(trim($this->searchKey))
                        ->orderByDesc('created_at')
                        ->paginate($this->perPage);
        return view('livewire.doctors.patients', compact('patients'));
    }
}
