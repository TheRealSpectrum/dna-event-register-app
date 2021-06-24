<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventNotification extends Notification
{
    use Queueable;

    private $notificationData;

    public function __construct($notificationData)
    {
        $this->notificationData = $notificationData;
    }

    public function via($notifiable): array
    {
        return ["mail", "database"];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject("Herinnering voor aankomend evenement")
            ->line(
                "Beste " .
                    $this->notificationData["name"] .
                    ", " .
                    " dit is een herinnering voor " .
                    $this->notificationData["title"] .
                    "."
            )
            ->action(
                $this->notificationData["time_till_event"],
                url($this->notificationData["url"])
            )
            ->line("We hopen je te ontvangen!");
    }

    public function toArray($notifiable): array
    {
        return [
            "event_id" => $this->notificationData["event_id"],
        ];
    }
}
