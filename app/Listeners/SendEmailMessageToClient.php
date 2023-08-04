<?php

namespace App\Listeners;

use App\Events\ClientVisit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

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
        Log::alert('Client has been visited');
    }
}