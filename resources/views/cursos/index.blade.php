@extends('layouts.app')

@section('title', 'Listado de Cursos')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <h1 class="mt-4">Cursos</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Imagen</th> <!-- Nueva columna para la imagen -->
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Duración</th>
                    <th>Precio</th>
                    <th>Modalidad</th>
                    <th>Días</th>
                    <th>Horarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <td>
                            @if ($curso->imagen)
                                <img src="{{ asset('images/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" width="100" height="100">
                            @else
                                <span>No hay imagen</span>
                            @endif
                        </td>
                        <td>{{ $curso->titulo }}</td>
                        <td>{{ $curso->descripcion }}</td>
                        <td>{{ $curso->duracion }} horas</td>
                        <td>${{ number_format($curso->precio, 2) }}</td>
                        <td>{{ $curso->modalidad }}</td>
                        <td>{{ $curso->dias }}</td>
                        <td>{{ $curso->horarios }}</td>
                        <td>
                            <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
