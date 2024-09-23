@extends('layouts.app')

@section('title', 'Detalles del Curso')

@section('content')
    <div class="container">
        <h1>{{ $curso->titulo }}</h1>
        <p class="lead">{{ $curso->descripcion }}</p>
        <p><strong>Duración:</strong> {{ $curso->duracion }} horas</p>
        <p><strong>Precio:</strong> ${{ $curso->precio }}</p>
        <p><strong>Modalidad:</strong> {{ $curso->modalidad }}</p>
        <p><strong>Días:</strong> {{ $curso->dias }}</p>
        <p><strong>Horarios:</strong> {{ $curso->horarios }}</p>

        @if ($curso->imagen)
            <div class="mb-3">
                <img src="{{ asset('images/' . $curso->imagen) }}" alt="Imagen del curso" class="img-thumbnail" style="max-width: 300px;">
            </div>
        @endif
        
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
@endsection
