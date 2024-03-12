{{-- Creamos una vista a partir del layout --}}
@extends('layouts.layout')

{{-- Vista Principal Alumnos --}}

@section('titulo', 'Home Alumnos')
@section('subtitulo', 'Panel Control Alumnos')

@section('contenido')
    {{-- Menú de Alumnos --}}
    @include('students.partials.menu')
    @include('partials.alerts')

    {{-- Lista de Alumnos --}}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($alumnos as $alumno)
                <tr>
                    <td scope="row">{{ $alumno->id }}</td>
                    <td>{{ $alumno->lastname }}</td>
                    <td>{{ $alumno->name }}</td>
                    <td>{{ $alumno->phone }}</td>
                    <td>{{ $alumno->city }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->course->course }}</td>

                    {{-- Botones de Acción --}}
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <!-- botón eliminar -->
                            <a href="#" title="Eliminar" class="btn btn-danger"
                                onclick="return confirm('Confirmar eliminación del Alumno')"> <i class="bi bi-trash"></i>
                            </a>

                            <!-- botón editar -->
                            <a href="#" title="Editar" class="btn btn-primary"> <i class="bi bi-pencil"></i>
                            </a>

                            <!-- botón mostrar -->
                            <a href="#" title="Mostrar" class="btn btn-warning"> <i class="bi bi-eye-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <p>No hay alumnos registrados</p>
            @endforelse
        </tbody>
    </table>
    <br><br><br>
@endsection
