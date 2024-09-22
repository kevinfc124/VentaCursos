@extends('layouts.app')

@section('title', 'Editar Curso')

@section('content')
    <h1>Editar Curso</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $curso->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $curso->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duracion" class="form-label">Duración (horas)</label>
            <input type="number" name="duracion" id="duracion" class="form-control" value="{{ $curso->duracion }}" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{ $curso->precio }}" required>
        </div>

        <div class="mb-3">
            <label for="modalidad" class="form-label">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-select" required>
                <option value="presencial" {{ $curso->modalidad == 'presencial' ? 'selected' : '' }}>Presencial</option>
                <option value="online" {{ $curso->modalidad == 'online' ? 'selected' : '' }}>Online</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Días</label>
            <input type="text" name="dias" id="dias" class="form-control" value="{{ $curso->dias }}" required>
        </div>

        <div class="mb-3">
            <label for="horarios" class="form-label">Horarios</label>
            <input type="text" name="horarios" id="horarios" class="form-control" value="{{ $curso->horarios }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Curso</button>
    </form>
@endsection
