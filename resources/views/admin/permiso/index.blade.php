@extends('template/admin')
@section('contenido')
        <div class="row">
            <div class="col-md-2">
                <a href="{{route('permiso.create')}}" class="btn btn-primary">
                    Agregar
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-stripped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>OPCIONES</th>
                    </tr>
                    @foreach($permisos as $permiso)
                    <tr>
                        <td>{{$permiso->id}}</td>
                        <td>{{$permiso->name}}</td>
                        <td><a href="{{route('permiso.edit', $permiso->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            @if($permiso->estado == 1)
                                <a href="{{route('permiso.destroy', $permiso->id)}}" class="lbl-estado text-bg-success" onClick="return confirm('Esta seguro de eliminar el dato.?')">Activo</a>
                            @elseif($permiso->estado == 0)
                                <a href="{{route('permiso.destroy', $permiso->id)}}" class="lbl-estado text-bg-danger" onClick="return confirm('Esta seguro de eliminar el dato.?')">Inactivo</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    
@endsection

    