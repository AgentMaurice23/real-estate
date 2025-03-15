<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $fillable = ['user_id', 'property_id', 'room_id', 'apartment_id', 'land_id', 'profile_id', 'interaction_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function land()
    {
        return $this->belongsTo(Land::class);
    }

    public function profile()
    {
        return $this->belongsTo(User::class, 'profile_id');
    }

    public static function recordView($entityType, $entityId, $userId = null)
    {
        $interaction = new self([
            'user_id' => $userId,
            'interaction_type' => 'view',
        ]);

        switch ($entityType) {
            case 'property':
                $interaction->property_id = $entityId;
                break;
            case 'room':
                $interaction->room_id = $entityId;
                break;
            case 'apartment':
                $interaction->apartment_id = $entityId;
                break;
            case 'land':
                $interaction->land_id = $entityId;
                break;
            case 'profile':
                $interaction->profile_id = $entityId;
                break;
            case 'user':
                $interaction->user_id = $entityId;
                break;
        }

        $interaction->save();
    }

    public static function recordClick($entityType, $entityId, $userId = null)
    {
        $interaction = new self([
            'user_id' => $userId,
            'interaction_type' => 'click',
        ]);

        switch ($entityType) {
            case 'property':
                $interaction->property_id = $entityId;
                break;
            case 'room':
                $interaction->room_id = $entityId;
                break;
            case 'apartment':
                $interaction->apartment_id = $entityId;
                break;
            case 'land':
                $interaction->land_id = $entityId;
                break;
            case 'profile':
                $interaction->profile_id = $entityId;
                break;
        }

        $interaction->save();
    }
}


