<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class Profil extends Model
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'birthdate',
        'role',
        'country',
        'city' ,
        'biographie',
        'profession',
        'status',
        'profile_photo_path',
        'identity_piece',
        'profile_cover_path',

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
        'user_id'
    ];
    protected $casts = [
        'services' => 'array',
        'property_types' => 'array',
         'terms_accepted' => 'boolean',
        'privacy_accepted' => 'boolean',
        'publish_consent' => 'boolean',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    
}
