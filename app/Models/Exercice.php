<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'Duree',
    ];

    /**
     * La relation "plusieurs-à-plusieurs" avec SessionExercice.
     */
    public function sessionExercices()
    {
        return $this->belongsToMany(SessionExercice::class, 'session_exercice_exercice', 'exercice_id', 'session_exercice_id');
    }
}
