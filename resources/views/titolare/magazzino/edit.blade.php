@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Prodotto Magazzino - {{ $item->locale->ragione_sociale }}</h1>

    <form action="{{ route('titolare.magazzino.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="prodotto" class="form-label">Prodotto</label>
            <input type="text" name="prodotto" class="form-control" value="{{ $item->prodotto }}" required>
        </div>
        <div class="mb-3">
            <label for="quantita" class="form-label">Quantità</label>
            <input type="number" name="quantita" class="form-control" value="{{ $item->quantita }}" required>
        </div>
        <div class="mb-3">
            <label for="unita" class="form-label">Unità</label>
            <input type="text" name="unita" class="form-control" value="{{ $item->unita }}">
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection