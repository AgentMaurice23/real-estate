<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'user_id', 
        'description', 
        'address', 
        'city', 
        'postal_code', 
        'country', 
        'price', 
        'status', 
        'area', 
        'surface', 
        'floor', 
        'total_floors', 
        'bedrooms', 
        'bathrooms', 
        'toilets', 
        'sold', 
        'elevator', 
        'balcony', 
        'balcony_area', 
        'construction_year', 
        'heating_type', 
        'air_conditioning', 
        'energy_certifications', 
        'monthly_charges', 
        'security', 
        'amenities', 
        'images', 
        'documents', 
        'availability'
    ];

    protected $casts = [
        'sold' => 'boolean',
        'elevator' => 'boolean',
        'balcony' => 'boolean',
        'air_conditioning' => 'boolean',
        'images' => 'array',
        'documents' => 'array',
        'availability' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setDocumentsAttribute($value)
    {
        $this->attributes['documents'] = json_encode($value);
    }

    public function getDocumentsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setAvailabilityAttribute($value)
    {
        $this->attributes['availability'] = json_encode($value);
    }

    public function getAvailabilityAttribute($value)
    {
        return json_decode($value, true);
    }
}
