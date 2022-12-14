@extends('template/admin')
@section('contenido')
    <form action="{{route('persona.update', $persona->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="nombre" id="apellido" value="{{$persona->nombre}}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="apellido" id="apellido" value="{{$persona->apellido}}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Actualizar" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection