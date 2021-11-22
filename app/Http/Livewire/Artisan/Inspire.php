<?php

namespace App\Http\Livewire\Artisan;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Inspire extends Component
{
    use LivewireAlert;
    use WithRateLimiting;

    protected $listeners = [
        'run'
    ];

    public function runInspire()
    {
        try {
            $this->rateLimit(1);
        } catch (TooManyRequestsException $e) {
            $this->alert( 'error', "Slow down! Please wait another $e->secondsUntilAvailable seconds to log in.");
            return;
        }
        $this->alert('info', Artisan::output());
        Artisan::call('inspire');
        $this->alert('info', Artisan::output(), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true
        ]);
    }

    public function learn()
    {
        $this->alert('error', 'Currently unavailable...');
    }


    public function render()
    {
        return view('livewire.artisan.inspire');
    }
}
