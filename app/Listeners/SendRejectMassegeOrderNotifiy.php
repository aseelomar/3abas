<?php

namespace App\Listeners;

use App\Events\RejectOrderEvent;
use App\Notifications\RejectMassegeOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRejectMassegeOrderNotifiy
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
     * @param  object  $event
     * @return void
     */
    public function handle(RejectOrderEvent $event)
    {
        $order = $event->order;

        $order->notify( new RejectMassegeOrder());
    }
}
