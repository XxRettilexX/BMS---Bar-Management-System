<?php

namespace App\Http\Controllers\Titolare;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Locale;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $locali = $user->locali; // tutti i locali del titolare
        return view('titolare.dashboard', compact('locali'));
    }

    public function showLocale(Locale $locale)
    {
        $user = Auth::user();

        // Controllo sicurezza: il titolare può vedere solo i suoi locali
        if (!$user->locali->contains($locale)) {
            abort(403);
        }

        $magazzino   = $locale->magazzino()->orderBy('updated_at', 'desc')->get() ?? collect();
        $chiusure    = $locale->chiusure()->orderBy('data_chiusura', 'desc')->get() ?? collect();
        $dipendenti  = $locale->dipendenti()->orderBy('created_at', 'desc')->get() ?? collect();


        return view('titolare.locale', compact('locale', 'magazzino', 'chiusure', 'dipendenti'));
    }
    public function createLocale()
    {
        return view('titolare.create_locale');
    }

    public function storeLocale(Request $request)
    {
        $request->validate([
            'ragione_sociale' => 'required|string|max:150',
            'partita_iva' => 'required|string|max:20|unique:locali,partita_iva',
            'indirizzo' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:150',
        ]);

        $locale = Locale::create($request->all());

        // Associa il nuovo locale al titolare
        Auth::user()->locali()->attach($locale->id);

        return redirect()->route('titolare.dashboard')->with('success', 'Locale aggiunto correttamente!');
    }
}
