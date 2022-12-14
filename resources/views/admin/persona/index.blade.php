@extends('template/admin')
@section('contenido')
    @can('persona.index')
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('persona.create')}}" class="btn btn-primary">
                    Agregar
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            @for($i=0; $i<4; $i++)
                @foreach($personas as $persona)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header text-bg-success">
                            <h5>Codigo: {{$persona->id}}</h5>
                        </div>
                        <div class="card-body">
                            <p>{{$persona->nombre.' - '.$persona->apellido}}</p>
                            <hr>
                            <a href="{{route('persona.edit', $persona->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            @if($persona->estado == 1)
                                <a href="{{route('persona.destroy', $persona->id)}}" class="lbl-estado text-bg-success" onClick="return confirm('Esta seguro de eliminar el dato.?')">Activo</a>
                            @elseif($persona->estado == 0)
                                <a href="{{route('persona.destroy', $persona->id)}}" class="lbl-estado text-bg-danger" onClick="return confirm('Esta seguro de eliminar el dato.?')">Inactivo</a>
                            @endif
                            <span class="sp-fecha sp-registrado">Registrado en: {{$persona->created_at}}</span>
                            <span class="sp-fecha sp-modificado">Modificado en: {{$persona->updated_at}}</span>
                        </div>
                    </div>    
                </div>
                @endforeach
            @endfor
        </div>
    @endcan
    
@endsection

    