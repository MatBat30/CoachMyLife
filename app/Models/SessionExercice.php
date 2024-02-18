<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionExercice extends Model
{
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'nom',
        'Duree',
    ];

    // Relation avec Programme (une session peut appartenir à plusieurs programmes)
    public function programmes() {
        return $this->belongsToMany(Programme::class);
    }

    // Relation avec Exercice (une session contient plusieurs exercices)
    public function exercices() {
        return $this->belongsToMany(Exercice::class);
    }

}
