<?php

namespace App\Http\Controllers\Titolare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locale;
use App\Models\Utente;

class DipendenteController extends Controller
{
    public function create(Locale $locale)
    {
        return view('titolare.dipendenti.create', compact('locale'));
    }

    public function store(Request $request, Locale $locale)
    {
        $request->validate([
            'utente_id' => 'required|exists:utenti,id',
        ]);

        // Associa il dipendente al locale
        $locale->dipendenti()->attach($request->utente_id);

        return redirect()->route('titolare.locale.show', $locale->id)->with('success', 'Dipendente aggiunto!');
    }

    public function edit(Utente $dipendente)
    {
        return view('titolare.dipendenti.edit', compact('dipendente'));
    }

    public function update(Request $request, Utente $dipendente)
    {
        $request->validate([
            'nome' => 'required|string|max:150',
            'cognome' => 'required|string|max:150',
            'ruolo' => 'required|string|max:50',
        ]);

        $dipendente->update($request->all());

        return redirect()->route('titolare.locale.show', $dipendente->localiDipendente->first()->id ?? 1)->with('success', 'Dipendente aggiornato!');
    }

    public function destroy(Utente $dipendente)
    {
        // Rimuove la relazione con tutti i locali (o puoi personalizzare)
        $dipendente->localiDipendente()->detach();

        return back()->with('success', 'Dipendente rimosso dal locale!');
    }
}
