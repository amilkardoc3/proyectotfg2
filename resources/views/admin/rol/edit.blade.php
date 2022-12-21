@extends('template/admin')
@section('contenido')
    <form action="{{route('rol.update', $rol->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" id="name" value="{{$rol->name}}" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Actualizar" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection