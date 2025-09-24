@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi Nuovo Locale</h1>

    <form action="{{ route('titolare.locale.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ragione_sociale" class="form-label">Ragione Sociale</label>
            <input type="text" class="form-control" id="ragione_sociale" name="ragione_sociale" required>
        </div>
        <div class="mb-3">
            <label for="partita_iva" class="form-label">Partita IVA</label>
            <input type="text" class="form-control" id="partita_iva" name="partita_iva" required>
        </div>
        <div class="mb-3">
            <label for="indirizzo" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="indirizzo" name="indirizzo">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <button type="submit" class="btn btn-success">Salva Locale</button>
        <a href="{{ route('titolare.dashboard') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection