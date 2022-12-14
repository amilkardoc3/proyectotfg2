@extends('template/admin')
@section('contenido')
    <form action="{{route('persona.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" 
                    onkeypress="return soloLetra(event)" required>
            </div>
            <div class="col-md-4">
                <label for="">Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control" ´
                onkeypress="return soloLetra(event)" required>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Registrar" class="btn btn-success btn-block mt-4">
            </div>
        </div>
    </form>
@endsection