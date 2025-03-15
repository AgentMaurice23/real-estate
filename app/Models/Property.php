<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'surface', 'address', 'city', 'postal_code', 'country', 
        'price', 'status', 'availability', 'area', 'bedrooms', 'bathrooms', 
        'toilets', 'levels', 'property_type', 'construction_year', 'condition', 
        'garage', 'garden', 'garden_area', 'pool', 'heating_type', 'sold',
        'air_conditioning', 'energy_certifications', 'amenities', 'fichiers', 'user_id', 'documents'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
    protected $casts = [
        'fichiers' => 'array',
        'documents' => 'array',
        'availability' => 'array',
    ];
    

    public function reponse()
    {
        return $this->belongsTo(Reponse::class);
    }

    public function getStatusLabel()
    {
        switch ($this->status) {
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

    public function setFichiersAttribute($value)
    {
        $this->attributes['fichiers'] = json_encode($value);
    }

    public function getFichiersAttribute($value)
    {
        return json_decode($value, true);
    }
}
