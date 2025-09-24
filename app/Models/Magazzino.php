<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazzino extends Model
{
    use HasFactory;

    protected $table = 'magazzino';

    protected $fillable = [
        'locale_id',
        'prodotto',
        'quantita',
        'unita'
    ];

    public function locale()
    {
        return $this->belongsTo(Locale::class, 'locale_id');
    }
}
