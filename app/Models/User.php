<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;


class User extends Authenticatable
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
        'password',

    ];
   
    public function isOnline()
    {
        // Définissez une période d'activité, par exemple 5 minutes
        $activityPeriod = Carbon::now()->subMinutes(5);

        // Vérifie si la dernière connexion de l'utilisateur est plus récente que la période d'activité
        return $this->last_login > $activityPeriod;
    }

    public function timeSinceLastLogin()
    {
        // Calcule le temps écoulé depuis la dernière connexion en utilisant la méthode diffForHumans de Carbon
        return Carbon::parse($this->last_login)->diffForHumans();
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function profil()
    {
        return $this->hasOne(Profil::class);
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
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
    public function resetTwoFactorCode()
    {
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
}
