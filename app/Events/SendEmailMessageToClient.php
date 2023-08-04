<?php

namespace App\Events;

use App\Events\ClientVisit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailMessageToClient
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
     * @param  \App\Events\ClientVisit  $event
     * @return void
     */
    public function handle(ClientVisit $event)
    {
        //
    }
}
