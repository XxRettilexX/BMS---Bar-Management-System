@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Dashboard Titolare</h1>
        <a href="{{ route('titolare.locale.create') }}" class="btn btn-primary">
            + Aggiungi Locale
        </a>
    </div>

    <h3>Locali Affiliati</h3>
    <ul class="list-group">
        @foreach($locali as $locale)
        <li class="list-group-item">
            <a href="{{ route('titolare.locale.show', $locale->id) }}">
                {{ $locale->ragione_sociale }} - {{ $locale->partita_iva }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endsection