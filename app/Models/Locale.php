<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;

    protected $table = 'locali';

    protected $fillable = [
        'ragione_sociale',
        'partita_iva',
        'indirizzo',
        'telefono',
        'email'
    ];

    // Titolari
    public function titolari()
    {
        return $this->belongsToMany(Utente::class, 'locale_titolare', 'locale_id', 'utente_id');
    }

    // Dipendenti
    public function dipendenti()
    {
        return $this->belongsToMany(Utente::class, 'locale_dipendente', 'locale_id', 'utente_id');
    }

    // Magazzino
    public function magazzino()
    {
        return $this->hasMany(Magazzino::class, 'locale_id');
    }

    // Chiusure
    public function chiusure()
    {
        return $this->hasMany(ChiusuraCassa::class, 'locale_id');
    }
    public function casse()
    {
        return $this->hasMany(Cassa::class);
    }
}
