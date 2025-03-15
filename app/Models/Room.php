<?php

// app/Models/Room.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'type',
        'number_of_rooms',
        'surface',
        'number_of_beds',
        'bed_type',
        'private_bathroom',
        'equipments',
        'available_from',
        'price',
        'condition',
        'balcony',
        'view',
        'available',
        'status',
        'user_id',
        // 'sold',
        'images',
        // 'documents',
        // 'availability'
    ];
    protected $casts = [
        'images' => 'array',
        // 'documents' => 'array',
        // 'availability' => 'array',

    ];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function getEquipmentsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setEquipmentsAttribute($value)
    {
        $this->attributes['equipments'] = json_encode($value);
    }
    public function getStatusLabel()
    {
        switch ($this->statuts) {
            case 'en_attente':
                return 'En attente';
            case 'approuver':
                return 'Approuvée';
            case 'rejeter':
                return 'Rejetée';
            default:
                return 'Indéfini';
        }
    }
}
