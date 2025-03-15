<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seach extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'price',
        'city',
        'country',
        'user_id',
      
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
}
