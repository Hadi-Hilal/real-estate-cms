<?php

namespace Modules\Blog\app\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\Blog\app\Models\BlogPost;

class NotifySubscribers extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected BlogPost $post)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line($this->post->title)
            ->line($this->post->description)
            ->action(__('Complete Reading'), 'https://laravel.com')
            ->line(__('Thanks For Subscription'));
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
