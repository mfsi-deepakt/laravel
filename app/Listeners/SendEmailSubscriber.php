<?php

namespace App\Listeners;

use App\User;
use Illuminate\Support\Facades\Mail;

class SendEmailSubscriber
{
    /**
     * Handle user login events.
     */
    public function onFeedbackAdded($event) {
        $admin = User::find(2);
        return Mail::to($admin)->send(new \App\Mail\FeedbackNotification($event->feedback));
    }

    /**
     * Handle user logout events.
     */
    public function onCommentAdded($event) {
        $admin = User::find(2);
        return Mail::to($admin)->send(new \App\Mail\CommentNotification($event->comment));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\FeedbackAdded',
            'App\Listeners\SendEmailSubscriber@onFeedbackAdded'
        );

        $events->listen(
            'App\Events\CommentAdded',
            'App\Listeners\SendEmailSubscriber@onCommentAdded'
        );
    }

}