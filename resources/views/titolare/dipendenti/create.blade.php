@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi Dipendente - {{ $locale->ragione_sociale }}</h1>

    <form action="{{ route('titolare.dipendenti.store', $locale->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Seleziona dipendente</label>
            <select name="utente_id" class="form-control" required>
                @foreach(App\Models\Utente::all() as $utente)
                <option value="{{ $utente->id }}">{{ $utente->nome }} {{ $utente->cognome }} - {{ $utente->ruolo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
</div>
@endsection