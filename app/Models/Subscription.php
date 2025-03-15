<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'room_id',
        'land_id',
        'duration',
        'price',
        'start_date',
        'end_date'
    ];

    // Définir les relations
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

    public function land()
    {
        return $this->belongsTo(Land::class);
    }

    // Vérifiez si le boost est toujours actif
    public function isActive()
    {
        return Carbon::now()->lessThan($this->end_date);
    }
}
