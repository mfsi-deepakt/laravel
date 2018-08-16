<?php

namespace App\Listeners;

use App\Events\FeedbackAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendNotifications;

class SendEmailForUser
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
     * @param  FeedbackAdded  $event
     * @return void
     */
    public function handle(FeedbackAdded $event)
    {   
        SendNotifications::dispatch($event->feedback);
    }
}
