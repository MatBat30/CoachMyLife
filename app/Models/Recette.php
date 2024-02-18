<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    protected $fillable = ['name', 'temps_preparation', 'glucides', 'proteines', 'lipides', 'description', 'menu_id', 'image','ingredients','conseils_consomation'];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
}

