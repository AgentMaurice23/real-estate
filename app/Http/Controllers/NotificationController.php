<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use App\Models\User;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Chatify\Facades\ChatifyMessenger as Chatify;
class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notifications = $user->notifications;
        $unreadNotificationsCount = $user->unreadNotifications->count();
        $messages = $user->getUnreadMessages();
        $unreadMessageCount = $user->getMessageCount();
        return view('home', compact('notifications', 'unreadNotificationsCount','messages','unreadMessageCount'));
    }
    public function getUnreadMessages()
    {
        if (auth()->check()) {
            return ChMessage::with('sender')
                            ->where('to_id', auth()->id())
                            ->where('seen', false)
                            ->get();
        }
        return collect();
    }

    public function getMessageCount()
    {
        if (auth()->check()) {
            return ChMessage::where('to_id', auth()->id())
                            ->where('seen', false)
                            ->count();
        }
        return 0;
    }
    public function markAsReadAndRedirect($id)
    {
        $notification = DatabaseNotification::find($id);

        if ($notification) {
            $notification->markAsRead();

            $propertyType = $notification->data['property_type'] ?? $notification->data['type'];
            $propertyId = $notification->data['property_id'] ?? $notification->data['profil_id'];

            switch ($propertyType) {
                case 'property':
                    return redirect()->route('property.details-properties', ['property' => $propertyId]);
                case 'land':
                    return redirect()->route('land.detail-land', ['land' => $propertyId]);
                case 'room':
                    return redirect()->route('room.detail-room', ['room' => $propertyId]);
                case 'agency':
                    return redirect()->route('profile.show', ['profil' => $propertyId]);
                default:
                    return redirect()->route('/');
            }
        }

        return redirect()->route('/')->withErrors('Notification not found.');
    }
}
