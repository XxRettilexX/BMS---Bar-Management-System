@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi Chiusura - {{ $locale->ragione_sociale }}</h1>

    <form action="{{ route('titolare.chiusure.store', $locale->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Scarico contante</label>
            <input type="number" name="scarico_contante" class="form-control">
        </div>
        <div class="mb-3">
            <label>Fondo cassa</label>
            <input type="number" name="fondo_cassa" class="form-control">
        </div>
        <div class="mb-3">
            <label>Spese</label>
            <input type="number" name="spese" class="form-control">
        </div>
        <div class="mb-3">
            <label>Chiusura POS</label>
            <input type="number" name="chiusura_pos" class="form-control">
        </div>
        <div class="mb-3">
            <label>Data chiusura</label>
            <input type="datetime-local" name="data_chiusura" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection