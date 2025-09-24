<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiusuraCassa extends Model
{
    use HasFactory;

    protected $table = 'chiusure';

    protected $fillable = [
        'locale_id',
        'utente_id',
        'scarico_contante',
        'fondo_cassa',
        'spese',
        'chiusura_pos',
        'data_chiusura'
    ];

    public function locale()
    {
        return $this->belongsTo(Locale::class, 'locale_id');
    }

    public function utente()
    {
        return $this->belongsTo(Utente::class, 'utente_id');
    }
}
