<?php

namespace App\Http\Livewire\Artisan;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Log;

class RunSchedulerCommand extends Component
{
    use LivewireAlert;
    use WithRateLimiting;

    protected $listeners = [
        'run'
    ];

    public function run()
    {
        try {
            $this->rateLimit(1, 6000, 'run');
            $currentuser = auth()->user ()->id;
            Artisan::call('schedule:run');
            Log::warning('Scheduler command ran!', ['Command Ran by User ID:' => $currentuser]);
            $this->alert('success', Artisan::output());
        } catch (TooManyRequestsException $e) {
            $this->alert( 'error', "Slow down! Please wait another $e->secondsUntilAvailable seconds to log in.");
            return;
        }
    }

    public function learn()
    {
            $this->alert('error', 'Currently unavailable...');
    }

    public function render()
    {
        return view('livewire.artisan.run-scheduler-command');
    }
}
