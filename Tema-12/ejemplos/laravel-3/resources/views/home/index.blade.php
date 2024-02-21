<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        table {
            border-collapse: collapse;
            border: 5px solid black;
        }

        th,
        td {
            border: 2px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>Hola Mundo Blade Laravel</h1>
    <footer>
        <p>Autor: {{ $autor }}</p>
        <p>Curso: {{ $curso }}</p>
        <p>Módulo: {{ $modulo ?? 'Sin módulo' }}</p>

        {{-- Si queremos escribir un comentario usamos la siguiente estructura --}}

        {{-- Para hacer un IF --}}

        @if ($num_alumnos == 1)
            <p>Solo hay un alumno en este módulo</p>
        @elseif($num_alumnos > 1)
            <p>Hay {{ $num_alumnos }} alumnos en este módulo</p>
        @elseif($num_alumnos <= 0)
            <p>No hay ningún alumno en este módulo</p>dd
        @endif

        {{-- Para hacer un Foreach --}}
        {{-- Vamos a hacer una tabla dinámica con los Alumnos --}}
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                </tr>
            </thead>

            <tbody>
                <p>Lista de Alumnos:</p>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno['id'] }}</td>
                        <td>{{ $alumno['nombre'] }}</td>
                        <td>{{ $alumno['apellidos'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Forelse hace un bucle y controla si no hay elementas --}}
        @forelse($arrayVacio as $key)
            {{ print_r($key) }}
        @empty
            <p>No hay elementos</p>
        @endforelse

    </footer>

</body>

</html>
