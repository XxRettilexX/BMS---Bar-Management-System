<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utente extends Authenticatable
{
    use Notifiable;

    protected $table = 'utenti';

    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'password',
        'ruolo',
        'salario_base',
        'data_assunzione'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relazione con i locali (titolare)
    public function locali()
    {
        return $this->belongsToMany(Locale::class, 'locale_titolare', 'utente_id', 'locale_id');
    }

    // Relazione con le chiusure fatte dall'utente
    public function chiusure()
    {
        return $this->hasMany(ChiusuraCassa::class, 'utente_id');
    }

    // Relazione con i locali in cui lavora (dipendente)
    public function localiDipendente()
    {
        return $this->belongsToMany(Locale::class, 'locale_dipendente', 'utente_id', 'locale_id');
    }
}
