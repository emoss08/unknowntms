<?php

namespace App\Broadcasting;

use App\Models\Tractors;
use App\Models\User;

class TractorChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user, Tractors $tractor)
    {
        return $user->id === $tractor->entered_by;
    }
}
