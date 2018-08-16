<?php

namespace App\Jobs;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\CommentNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackNotification;

class SendNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $notification;
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        if ($this->notification instanceof Comment) {
            return Mail::to($this->notification->feedback->user)->send(new CommentNotification($this->notification));
        } else {
            return Mail::to($this->notification->user)->send(new FeedbackNotification($this->notification));
        }
    }
}
