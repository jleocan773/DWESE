@extends('layouts.layout')

@section('titulo', 'Alumnos')
@section('subtitulo', 'Mostrar Alumno')
@section('contenido')
    @include('partials.alerts')
    <div class="card">
        <div class="card-header">
            Datos del Alumno
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ $alumno->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="lastname" value="{{ $alumno->lastname }}" disabled>
            </div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="birth_date" value="{{ $alumno->birth_date }}" disabled>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $alumno->email }}" disabled>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" name="phone" value="{{ $alumno->phone }}" disabled>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Población</label>
                <input type="text" class="form-control" name="city" value="{{ $alumno->city }}" disabled>
            </div>

            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="{{ $alumno->dni }}" disabled>
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Curso</label>
                <input type="text" class="form-control" name="course_id" value="{{ $alumno->course->course }}" disabled>
            </div>
        </div>

        <div class="card-footer text-muted">
            <a class="btn btn-secondary" href="{{ route('alumnos.index') }}" role="button">Volver</a>
        </div>

        <div class="card-footer text-muted">
            <!-- Botones de acción --------------------------------------------------->
            <a class="btn btn-secondary" href="{{ route('alumnos.index') }}" role="button">Volver</a>
        </div>
    </div>
@endsection
