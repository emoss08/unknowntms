<?php

namespace App\Http\Livewire\Artisan;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Artisan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Log;

class FlushFailedJobs extends Component
{
    use LivewireAlert;
    use WithRateLimiting;

    protected $listeners = [
        'run'
    ];

    public function runFlushJobs()
    {
        $currentuser = auth()->user ()->id;
        try {
            $this->rateLimit(1);
        } catch (TooManyRequestsException $e) {
            $this->alert( 'error', "Slow down! Please wait another $e->secondsUntilAvailable seconds to log in.");
            return;
        }
        $this->alert('info', Artisan::output());
        Artisan::call('queue:flush');
        Log::warning('Flushed Failed Jobs artisan command ran!', ['Command Ran by User ID:' => $currentuser]);
        $this->alert('success', 'Artisan command: flush-jobs ran successfully');
    }

    public function learn()
    {
        $this->alert('error', 'Currently unavailable...');
    }

    public function render()
    {
        return view('livewire.artisan.flush-failed-jobs');
    }
}
