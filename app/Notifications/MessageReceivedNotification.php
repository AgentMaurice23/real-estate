<?php
namespace App\Notifications;

use App\Models\User;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $sender;
    protected $message;

    public function __construct(User $sender, Message $message)
    {
        $this->sender = $sender;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database']; // Stocker la notification dans la base de données
    }

    public function toArray($notifiable)
    {
        return [
            'action_type' => 'message',
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
            'message_id' => $this->message->id,
            'message_body' => $this->message->body,
            // Ajoutez d'autres informations nécessaires à la notification
        ];
    }
}
