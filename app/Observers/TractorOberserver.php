<?php

namespace App\Observers;

use App\Models\Tractors;
use App\Notifications\TractorAdded;
use Illuminate\Support\Facades\Notification;

class TractorOberserver
{

    /**
     * Handle the Tractors "created" event.
     *
     * @param  \App\Models\Tractors  $tractors
     * @return void
     */
    public function created(Tractors $tractors)
    {
        info('Tractor created');
    }

    /**
     * Handle the Tractors "updated" event.
     *
     * @param  \App\Models\Tractors  $tractors
     * @return void
     */
    public function updated(Tractors $tractors)
    {
        info('Tractor Updated');
    }

    /**
     * Handle the Tractors "deleted" event.
     *
     * @param  \App\Models\Tractors  $tractors
     * @return void
     */
    public function deleted(Tractors $tractors)
    {
        //
    }

    /**
     * Handle the Tractors "restored" event.
     *
     * @param  \App\Models\Tractors  $tractors
     * @return void
     */
    public function restored(Tractors $tractors)
    {
        //
    }

    /**
     * Handle the Tractors "force deleted" event.
     *
     * @param  \App\Models\Tractors  $tractors
     * @return void
     */
    public function forceDeleted(Tractors $tractors)
    {
        //
    }
}
