@extends('template/admin')
@section('contenido')
    <form action="{{route('usuario.update', $usuario->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <label for="">Usuario:</label>
                <label for="">{{$usuario->persona->nombre.' '.$usuario->persona->apellido}}</label>
            </div>
            <!-- <div class="col-md-4">
                <label for="">Permisos</label>
                <select name="permiso_id[]" id="permiso_id[]" class="form-control" multiple required>
                    <option value="">Seleccionar rol</option>
                    @foreach($permisos as $permiso)
                        <option value="{{$permiso->id}}">{{$permiso->name}}</option>
                    @endforeach
                </select>
            </div> -->
            <legend>Permisos</legend>
            @foreach($permisos as $permiso)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permiso_id[]" value="{{$permiso->id}}" id="flexCheckDefault">
                @foreach($permisos_usuario as $permiso_usuario)
                    @if($permiso_usuario->permission_id == $permiso->id)
                        <input class="form-check-input" type="checkbox" name="permiso_id[]"  value="{{$permiso->id}}" id="flexCheckDefault" checked>
                    @endif
                @endforeach
                <label class="form-check-label" for="flexCheckDefault">
                    {{$permiso->name}}
                </label>
            </div>
            @endforeach
            <div class="col-md-4">
                <input type="submit" value="Registrar" class="btn btn-success btn-block mt-4">
            </div>
        </div>
    </form>
@endsection