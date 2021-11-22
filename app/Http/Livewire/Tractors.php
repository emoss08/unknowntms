<?php

namespace App\Http\Livewire;

use App\Exports\TractorsExport;
use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Tractors extends Component
{
    use LivewireAlert;

    public function export()
    {
        $this->alert('success', 'Export Successful!');
        return (new TractorsExport)->download('tractors.xlsx');
    }

    public function render()
    {
        return view('livewire.tractors');
    }
}
