<?php
namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactRequestNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable): array
    {
        return ['mail', 'database']; // Envoyer par email et stocker dans la base de données
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('New Contact Request')
                    ->line('You have received a new contact request.')
                    ->line('Details:')
                    ->line('Name: ' . $this->contact->name)
                    ->line('Phone: ' . $this->contact->phone)
                    ->line('Email: ' . $this->contact->email)
                    ->line('Message:')
                    ->line($this->contact->message)
                    ->action('View Message', url('/')); // Lien pour voir le message, ajustez selon votre besoin
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable): array
    {
        return [
            'action_type' => 'contact_request',
            'contact_id' => $this->contact->id,
            'contact_name' => $this->contact->name,
            // Ajoutez d'autres informations nécessaires à la notification
        ];
    }
}
