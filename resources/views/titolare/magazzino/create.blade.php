@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi Prodotto Magazzino - {{ $locale->ragione_sociale }}</h1>

    <form action="{{ route('titolare.magazzino.store', $locale->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="prodotto" class="form-label">Prodotto</label>
            <input type="text" name="prodotto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quantita" class="form-label">Quantità</label>
            <input type="number" name="quantita" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="unita" class="form-label">Unità</label>
            <input type="text" name="unita" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection