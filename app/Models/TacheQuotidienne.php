<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TacheQuotidienne extends Model
{
    protected $fillable = ['user_id', 'nom', 'status'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
