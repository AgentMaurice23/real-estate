<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BoostSubscriptionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Envoyer par email et stocker dans la base de données
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Une nouvelle demande de boost a été créée.')
                    ->line('Détails:')
                    ->line('Type: ' . $this->data['type'])
                    ->line('Titre: ' . $this->data['title'])
                    ->line('Durée: ' . $this->data['duration'] . ' jours')
                    ->line('Prix: ' . $this->data['price'] . ' F')
                    ->action('Voir l\'annonce', url('/'))
                    ->line('Merci d\'utiliser notre application!');
    }

    public function toArray($notifiable)
    {
        return [
            'action_type' => 'boost',
            'type' => $this->data['type'],
            'title' => $this->data['title'],
            'duration' => $this->data['duration'],
            'price' => $this->data['price'],
            'user_id' => $this->data['user_id'],
            'user_email' => $this->data['user_email'],
        ];
    }
}
