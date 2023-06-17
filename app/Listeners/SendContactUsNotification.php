<?php

namespace App\Listeners;


use App\Events\ContactUsEvent;
use App\Models\ContactUS;
use App\Models\CouponProduct;
use App\Notifications\ContactUsNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendContactUsNotification
{

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle( ContactUsEvent $event)
    {
        /** @var ContactUS $contact */
        $contact = $event->contactUs;

       $contact->notify( new ContactUsNotification());
    }
}
