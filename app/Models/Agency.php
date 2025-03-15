<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'city',
        'country',
        'phone',
        'email',
        'website',
        'registration_number',
        'vat_number',
        'agency_type',
        'foundation_year',
        'manager_name',
        'manager_email',
        'manager_phone',
        'services',
        'service_areas',
        'current_listings',
        'property_types',
        'license_path',
        'insurance_path',
        'opening_hours',
        'description',
        'photos',
        'terms_accepted',
        'privacy_accepted',
        'publish_consent',
    ];

    protected $casts = [
        'services' => 'array',
        'property_types' => 'array',
        'photos' => 'array',
        'terms_accepted' => 'boolean',
        'privacy_accepted' => 'boolean',
        'publish_consent' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
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
