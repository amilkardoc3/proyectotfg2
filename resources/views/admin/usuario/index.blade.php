@extends('template/admin')
@section('contenido')
    <div class="row">
        <div class="col-md-2">
            <a href="{{route('usuario.create')}}" class="btn btn-primary">
                Agregar
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
            @foreach($usuarios as $usuario)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-bg-success">
                        <h5>Codigo: {{$usuario->id}}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{$usuario->persona->nombre.' - '.$usuario->persona->apellido}}</p>
                        <p>{{$usuario->email.' - '.$usuario->email}}</p>
                        <hr>
                        <a href="{{route('usuario.edit', $usuario->id)}}" class="btn btn-warning btn-sm">Editar</a>
                        @if($usuario->estado == 1)
                            <a href="{{route('usuario.destroy', $usuario->id)}}" class="lbl-estado text-bg-success" onClick="return confirm('Esta seguro de eliminar el dato.?')">Activo</a>
                        @elseif($usuario->estado == 0)
                            <a href="{{route('usuario.destroy', $usuario->id)}}" class="lbl-estado text-bg-danger" onClick="return confirm('Esta seguro de eliminar el dato.?')">Inactivo</a>
                        @endif
                        <span class="sp-fecha sp-registrado">Registrado en: {{$usuario->created_at}}</span>
                        <span class="sp-fecha sp-modificado">Modificado en: {{$usuario->updated_at}}</span>
                    </div>
                </div>    
            </div>
            @endforeach
    </div>
@endsection

    