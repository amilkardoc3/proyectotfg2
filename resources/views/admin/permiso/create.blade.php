@extends('template/admin')
@section('contenido')
    <form action="{{route('permiso.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" 
                    required>
            </div>
            <div class="col-md-4">
                <input type="submit" value="Registrar" class="btn btn-success btn-block mt-4">
            </div>
        </div>
    </form>
@endsection