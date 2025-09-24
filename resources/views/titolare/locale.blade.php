@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $locale->ragione_sociale }}</h1>
    <p>Partita IVA: {{ $locale->partita_iva }}</p>

    <!-- Magazzino -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
        <h3>Magazzino</h3>
        <a href="{{ route('titolare.magazzino.create', $locale->id) }}" class="btn btn-success btn-sm">+ Aggiungi</a>
    </div>
    <ul class="list-group mb-4">
        @foreach($magazzino as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $item->prodotto }} - {{ $item->quantita }} {{ $item->unita }}
            <a href="{{ route('titolare.magazzino.edit', $item->id) }}" class="btn btn-primary btn-sm">Modifica</a>
        </li>
        @endforeach
    </ul>

    <!-- Chiusure -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
        <h3>Chiusure</h3>
        <a href="{{ route('titolare.chiusure.create', $locale->id) }}" class="btn btn-success btn-sm">+ Aggiungi</a>
    </div>
    <ul class="list-group mb-4">
        @foreach($chiusure as $chiusura)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $chiusura->data_chiusura }} - Totale: {{ $chiusura->scarico_contante + $chiusura->fondo_cassa + $chiusura->chiusura_pos - $chiusura->spese }}
            <a href="{{ route('titolare.chiusure.edit', $chiusura->id) }}" class="btn btn-primary btn-sm">Modifica</a>
        </li>
        @endforeach
    </ul>

    <!-- Dipendenti -->
    <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
        <h3>Dipendenti</h3>
        <a href="{{ route('titolare.dipendenti.create', $locale->id) }}" class="btn btn-success btn-sm">+ Aggiungi</a>
    </div>
    <ul class="list-group">
        @foreach($dipendenti as $dipendente)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $dipendente->nome }} {{ $dipendente->cognome }} - {{ $dipendente->ruolo }}
            <a href="{{ route('titolare.dipendenti.edit', $dipendente->id) }}" class="btn btn-primary btn-sm">Modifica</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection