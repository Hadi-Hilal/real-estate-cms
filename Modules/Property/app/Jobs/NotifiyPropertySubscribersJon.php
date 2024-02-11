<?php

namespace Modules\Property\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Modules\Property\app\Models\Property;
use Modules\Property\app\Notifications\NotifiyPropertySubscribers;
use Modules\Subscriber\app\Models\Subscriber;

class NotifiyPropertySubscribersJon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Property $property)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = Subscriber::all();
        Notification::send($subscribers, new NotifiyPropertySubscribers($this->property));
    }
}
