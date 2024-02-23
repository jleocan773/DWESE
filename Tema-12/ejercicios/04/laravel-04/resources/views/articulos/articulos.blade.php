@extends('layout')

@section('titulo', 'Artículos')
@section('subtitulo', 'Listado de artículos')

@section('contenido')
    <!-- Menú -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Home</a>
            <a class="navbar-brand" href="#">Artículos</a>
        </div>
    </nav>

    <!-- Cabecera de la tabla -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripción</th>
                <th scope="col">Categoría</th>
                <th scope="col">Unidades</th>
                <th scope="col">Precio Coste</th>
                <th scope="col">Precio Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <th scope="row">{{ $articulo->id }}</th>
                    <td>{{ $articulo->descripcion }}</td>
                    <td>{{ $articulo->categoria }}</td>
                    <td>{{ $articulo->unidades }}</td>
                    <td>{{ $articulo->precio_coste }}</td>
                    <td>{{ $articulo->precio_venta }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Número de registros -->
    <p>Número de registros: {{ count($articulos) }}</p>
@endsection
