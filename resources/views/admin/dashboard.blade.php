@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Admin</h1>

    <h3>Locali Affiliati</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ragione Sociale</th>
                <th>Partita IVA</th>
                <th>Indirizzo</th>
                <th>Telefono</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locali as $locale)
            <tr>
                <td>{{ $locale->id }}</td>
                <td>{{ $locale->ragione_sociale }}</td>
                <td>{{ $locale->partita_iva }}</td>
                <td>{{ $locale->indirizzo }}</td>
                <td>{{ $locale->telefono }}</td>
                <td>{{ $locale->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection