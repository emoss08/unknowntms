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

    public function runScheduler()
    {
        $currentuser = auth()->user ()->id;
        try {
            $this->rateLimit(1, 1,         Artisan::call('schedule:run'));
        } catch (TooManyRequestsException $e) {
            $this->alert( 'error', "Slow down! Please wait another $e->secondsUntilAvailable seconds to log in.");
            return;
        }
        $this->alert('info', 'Running Artisan command: run-scheduler');
        Log::warning('Scheduler run artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
        $this->alert('success', 'Artisan command: run-scheduler ran successfully');
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
