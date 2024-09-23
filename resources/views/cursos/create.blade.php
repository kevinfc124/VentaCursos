@extends('layouts.app')

@section('title', 'Crear Curso')

@section('content')
<div class="container">
    <h1 class="mt-4">Crear Curso</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('cursos.store') }}" method="POST" enctype="multipart/form-data"> <!-- Añadir enctype para subir archivos -->
        @csrf
        
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="duracion">Duración (horas)</label>
            <input type="number" name="duracion" id="duracion" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" name="precio" id="precio" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="modalidad">Modalidad</label>
            <select name="modalidad" id="modalidad" class="form-control" required>
                <option value="presencial">Presencial</option>
                <option value="online">Online</option>
            </select>
        </div>

        <div class="form-group">
            <label for="dias">Días</label>
            <input type="text" name="dias" id="dias" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="horarios">Horarios</label>
            <input type="text" name="horarios" id="horarios" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control-file"> <!-- Mejorar estilo del input -->
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Curso</button>
    </form>
</div>
@endsection
