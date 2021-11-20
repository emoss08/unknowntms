<?php

namespace App\Listeners;

use App\Events\TractorCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTractorNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TractorCreated  $event
     * @return void
     */
    public function handle(TractorCreated $event)
    {
        //
    }
}
