<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Chatify\Traits\UUID;

class ChMessage extends Model
{
    use UUID;
    // Relation avec le modèle User pour obtenir les détails de l'expéditeur
    public function sender()
    {
        return $this->belongsTo(User::class, 'from_id');
    }
}
