<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cassa extends Model
{
    protected $table = 'casse';
    protected $fillable = ['nome', 'locale_id'];

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }

    public function chiusure()
    {
        return $this->hasMany(ChiusuraCassa::class);
    }
}
