<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpcomingActivityNotification extends Notification
{
    use Queueable;

    protected $activity;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activity)
    {
        $this->activity = $activity;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Upcoming Activity: ' . $this->activity->title)
                    ->line('We are excited to inform you about an upcoming activity: ' . $this->activity->title)
                    ->line('Location: ' . $this->activity->location)
                    ->line('Date: ' . $this->activity->date)
                    ->line('We hope to see you there!')
                    ->action('View Activity', url('/activities/' . $this->activity->id))
                    ->line('Thank you for being a part of our community!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'activity_id' => $this->activity->id,
            'title' => $this->activity->title,
            'location' => $this->activity->location,
            'date' => $this->activity->date,
        ];
    }
}