<?php

namespace App\Http\Controllers\Titolare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locale;

class CassaController extends Controller
{
    public function store(Request $request, Locale $locale)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
        ]);

        $locale->casse()->create([
            'nome' => $request->nome
        ]);

        return redirect()->route('titolare.chiusure.create', $locale->id)
            ->with('success', 'Cassa creata con successo!');
    }
}
