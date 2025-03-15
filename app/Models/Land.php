<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'surface',
    //     'price',
    //     'land_type',
    //     'city',
    //     'address',
    //     'country',
    //     'postal_code',
    //     'availability',
    //     'description',
    //     'user_id',
    //     'images',
    //     'documents',
    //     'statuts'
    // ];

    protected $fillable = [
        'title', 'description', 'surface', 'address', 'city', 'postal_code', 'country', 
        'price', 'status', 'availability', 'area', 'land_type', 'zoning', 
        'services', 'topography', 'access', 'survey', 'urban_certificate', 
        'restrictions', 'amenities', 'sold', 'user_id', 'images', 'documents',
    ];

    protected $casts = [
        'images' => 'array',
        'documents' => 'array',
        'availability' => 'array',
        'sold' => 'boolean',
        'survey' => 'boolean',
        'urban_certificate' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
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
