@extends('template/admin')
@section('contenido')
    <form action="{{route('usuario.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="">Persona</label>
                <select name="persona_id" id="" class="form-control" required>
                    <option value="">Seleccionar</option>
                    @foreach($personas as $persona)
                        <option value="{{$persona->id}}">{{$persona->nombre.' '.$persona->apellido}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Correo</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Registrar" class="btn btn-success btn-block mt-4">
            </div>
        </div>
    </form>
@endsection