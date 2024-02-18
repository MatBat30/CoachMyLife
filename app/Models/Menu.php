<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'programme_id'];

    public function programme() {
        return $this->belongsTo(Programme::class);
    }

    public function recettes() {
        return $this->hasMany(Recette::class);
    }
}

