<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'email',
        'password',
        'programme_id',
        'prenom',
        'date_naissance',
        'sex',
        'poids',
        'taille',
        'telephone',
        'adresse',
        'date_naissance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function booted(): void
    {
        static::saved(function ($user) {
            if ($user->isDirty('programme_id')) {
                $TacheQuotidienne = [
                    'faire 3 séries de 10 pompes',
                    'courir pendant 15 minutes',
                    'ne pas manger de sucrerie',
                    'ne pas grignoter entre les repas',
                    'faire 3 séries de 15 squats',
                    'me coucher avant minuit',
                    'ne pas manger de friture',
                    'boire 1,5L d\'eau',
                    'eviter les boissons sucres',
                    'dormir 8h par nuit',
                    'ne pas manger de gras le soir'
                ];

                foreach ($TacheQuotidienne as $tache) {
                    TacheQuotidienne::create([
                        'user_id' => $user->id,
                        'nom' => $tache,
                        'status' => 0,
                    ]);
                }
            }
        });
    }


    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }
    public function taches()
    {
        return $this->hasMany(TacheQuotidienne::class);
    }

}
