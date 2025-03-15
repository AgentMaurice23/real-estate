<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewAgenceNotification extends Notification
{
    use Queueable;

    protected $profil;
    protected $dataAgence;

    public function __construct($profil, $dataAgence)
    {
        $this->profil = $profil;
        $this->dataAgence = $dataAgence;
    }

    public function via($notifiable)
    {
        return ['mail']; // Pour envoyer un email
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle agence créée')
            ->line('Une nouvelle agence a été créée avec les informations suivantes :')
            ->line('Nom de l\'agence : ' . $this->profil->name)
            ->line('Adresse : ' . $this->profil->address)
            ->line('Email du gestionnaire : ' . $this->dataAgence['user']['email'])
            ->action('Voir l\'agence', url('/agences/' . $this->profil->id))
            ->line('Merci de votre utilisation de notre application !');
    }

   public function toArray($notifiable)
    {
        return [
            'action_type' => $this->data['action_type'],
            'type' => $this->data['type'],
            'profil_id' => $this->data['profil_id'],
            'profil_name' => $this->data['profil_name'],
            'user_id' => $this->data['user']['id'],
            'user_email' => $this->data['user']['email'],
            'created_at' => $this->data['created_at']->toDateTimeString(),
        ];
    }
}
