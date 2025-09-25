@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea Chiusura per {{ $locale->ragione_sociale }}</h1>

    @if($casse->isEmpty())
    <div class="alert alert-warning">
        Nessuna cassa registrata per questo locale. Registrane subito una:
    </div>

    <form action="{{ route('titolare.casse.store', $locale->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome">Nome Cassa</label>
            <input type="text" name="nome" class="form-control" placeholder="Cassa principale" required>
        </div>
        <button type="submit" class="btn btn-success">Registra Cassa</button>
    </form>
    @else
    <form action="{{ route('titolare.chiusure.store', $locale->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="cassa_id">Seleziona Cassa</label>
            <select name="cassa_id" class="form-control" required>
                @foreach($casse as $cassa)
                <option value="{{ $cassa->id }}">{{ $cassa->nome }}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="scarico_contante">Scarico contante</label>
            <input type="number" name="scarico_contante" class="form-control">
        </div>
        <div class="mb-3">
            <label for="fondo_cassa">Fondo cassa</label>
            <input type="number" name="fondo_cassa" class="form-control">
        </div>
        <div class="mb-3">
            <label for="chiusura_pos">Chiusura POS</label>
            <input type="number" name="chiusura_pos" class="form-control">
        </div>
        <div class="mb-3">
            <label for="spese">Spese</label>
            <input type="number" name="spese" class="form-control">
        </div>
        <div class="mb-3">
            <label for="data_chiusura">Data Chiusura</label>
            <input type="date" name="data_chiusura" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registra Chiusura</button>
    </form>
    @endif
</div>
@endsection