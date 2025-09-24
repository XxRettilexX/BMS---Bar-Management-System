<?php

namespace App\Http\Controllers\Titolare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locale;
use App\Models\Magazzino;
use Illuminate\Support\Facades\Auth;

class MagazzinoController extends Controller
{
    public function create(Locale $locale)
    {
        return view('titolare.magazzino.create', compact('locale'));
    }

    public function store(Request $request, Locale $locale)
    {
        $request->validate([
            'prodotto' => 'required|string|max:150',
            'quantita' => 'required|numeric',
            'unita' => 'nullable|string|max:50',
        ]);

        $locale->magazzino()->create($request->all());

        return redirect()->route('titolare.locale.show', $locale->id)->with('success', 'Prodotto aggiunto al magazzino!');
    }

    public function edit(Magazzino $item)
    {
        return view('titolare.magazzino.edit', compact('item'));
    }

    public function update(Request $request, Magazzino $item)
    {
        $request->validate([
            'prodotto' => 'required|string|max:150',
            'quantita' => 'required|numeric',
            'unita' => 'nullable|string|max:50',
        ]);

        $item->update($request->all());

        return redirect()->route('titolare.locale.show', $item->locale_id)->with('success', 'Prodotto aggiornato!');
    }

    public function destroy(Magazzino $item)
    {
        $localeId = $item->locale_id;
        $item->delete();

        return redirect()->route('titolare.locale.show', $localeId)->with('success', 'Prodotto eliminato!');
    }
}
