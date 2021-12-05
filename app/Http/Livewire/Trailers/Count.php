<?php

namespace App\Http\Livewire\Trailers;

use App\Models\Trailers;
use DB;
use Livewire\Component;

class Count extends Component
{

    public function render()
    {
        // begin:: Last Inspection
        $trailers_count = DB::table('trailers')->count();
        $trailers = Trailers::latest()->paginate(5);
        // end:: Last Inspection

        return view('livewire.trailers.count')
            ->with('trailers_count', $trailers_count)
            ->with('trailers', $trailers);
    }
}
