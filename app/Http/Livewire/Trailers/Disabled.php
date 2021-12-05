<?php

namespace App\Http\Livewire\Trailers;

use DB;
use Livewire\Component;

class Disabled extends Component
{
    public function render()
    {
        // begin:: Active Trailers
        $inactive_trailers_count = DB::table('trailers')->where('status', '=', 'inactive')->count();
        $inactive_trailers = DB::table('trailers')->where('status', '=', 'inactive')->paginate(5);

        return view('livewire.trailers.disabled')->with([
            'inactive_trailers_count' => $inactive_trailers_count,
            'inactive_trailers' => $inactive_trailers,
        ]);
    }
}
