<?php

namespace Modules\Blog\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Modules\Blog\app\Models\BlogPost;
use Modules\Blog\app\Notifications\NotifySubscribers;
use Modules\Subscriber\app\Models\Subscriber;

class NotifySubscribersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private BlogPost $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = Subscriber::all();
        Notification::send($subscribers, new NotifySubscribers($this->post));
    }
}
