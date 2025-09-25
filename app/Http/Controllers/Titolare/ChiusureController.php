<?php

namespace App\Http\Controllers\Titolare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locale;
use App\Models\ChiusuraCassa;

class ChiusureController extends Controller
{
    public function create(Locale $locale)
    {
        $casse = $locale->casse()->get() ?? collect();
        return view('titolare.chiusure.create', compact('locale', 'casse'));
    }

    public function store(Request $request, Locale $locale)
    {
        $request->validate([
            'scarico_contante' => 'nullable|numeric',
            'fondo_cassa' => 'nullable|numeric',
            'spese' => 'nullable|numeric',
            'chiusura_pos' => 'nullable|numeric',
            'data_chiusura' => 'required|date',
            'cassa_id' => 'required|exists:casse,id',
        ]);

        $data = $request->all();
        $data['utente_id'] = auth()->id();
        $data['locale_id'] = $locale->id;

        ChiusuraCassa::create($data);


        return redirect()->route('titolare.locale.show', $locale->id)
            ->with('success', 'Chiusura registrata!');
    }


    public function edit(ChiusuraCassa $chiusura)
    {
        return view('titolare.chiusure.edit', compact('chiusura'));
    }

    public function update(Request $request, ChiusuraCassa $chiusura)
    {
        $request->validate([
            'scarico_contante' => 'nullable|numeric',
            'fondo_cassa' => 'nullable|numeric',
            'spese' => 'nullable|numeric',
            'chiusura_pos' => 'nullable|numeric',
            'data_chiusura' => 'required|date',
        ]);

        $chiusura->update($request->all());

        return redirect()->route('titolare.locale.show', $chiusura->locale_id)->with('success', 'Chiusura aggiornata!');
    }

    public function destroy(ChiusuraCassa $chiusura)
    {
        $localeId = $chiusura->locale_id;
        $chiusura->delete();

        return redirect()->route('titolare.locale.show', $localeId)->with('success', 'Chiusura eliminata!');
    }
}
