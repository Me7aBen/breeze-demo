@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorías</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nueva Categoría</a>
    <ul>
        @foreach ($categorias as $categoria)
            <li>
                <a href="{{ route('categorias.edit', $categoria) }}">{{ $categoria->nombre }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
