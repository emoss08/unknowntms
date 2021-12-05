<?php

namespace App\Http\Livewire\Trailers;

use DB;
use Livewire\Component;

class Active extends Component
{
    public function render()
    {
        // begin:: Active Trailers
        $active_trailers_count = DB::table('trailers')->where('status', '=', 'active')->count();
        $active_trailers = DB::table('trailers')->where('status', '=', 'active')->paginate(5);

        return view('livewire.trailers.active')->with([
            'active_trailers_count' => $active_trailers_count,
            'active_trailers' => $active_trailers,
        ]);
    }
}
