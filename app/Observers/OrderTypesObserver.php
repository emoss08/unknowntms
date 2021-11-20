<?php

namespace App\Observers;

use App\Models\OrderTypes;

class OrderTypesObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * Handle the OrderTypes "created" event.
     *
     * @param  \App\Models\OrderTypes  $orderTypes
     * @return void
     */
    public function created(OrderTypes $orderTypes)
    {
        //
    }

    /**
     * Handle the OrderTypes "updated" event.
     *
     * @param  \App\Models\OrderTypes  $orderTypes
     * @return void
     */
    public function updated(OrderTypes $orderTypes)
    {
        //
    }

    /**
     * Handle the OrderTypes "deleted" event.
     *
     * @param  \App\Models\OrderTypes  $orderTypes
     * @return void
     */
    public function deleted(OrderTypes $orderTypes)
    {
        //
    }

    /**
     * Handle the OrderTypes "restored" event.
     *
     * @param  \App\Models\OrderTypes  $orderTypes
     * @return void
     */
    public function restored(OrderTypes $orderTypes)
    {
        //
    }

    /**
     * Handle the OrderTypes "force deleted" event.
     *
     * @param  \App\Models\OrderTypes  $orderTypes
     * @return void
     */
    public function forceDeleted(OrderTypes $orderTypes)
    {
        //
    }
}
