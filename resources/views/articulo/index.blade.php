@extends('layouts.app')
@section('content')
<div class="container">
        <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">

    <div class="panel panel-default">
        <div class="panel-heading">
            <table>
                <tr class="form-group">
                    <th>
                        <h3> Articulos </h3>
                        <a class=" btn btn-info xs " href="{{ route('articulo.create') }}"> Add articulo </a>
                    </th>
                </tr>
            </table>
            <div class="panel-body">
                <form action="{{route ('search')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="id" placeholder="documento...">
                        <input type="submit" class="btn btn-primary xs" value="Buscar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (Session::has('success_msg'))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span>
        <em>{!! Session::get('success_msg') !!}</em>
    </div>
    @endif

    @if (Session::has('warning_msg'))
    <div class="alert alert-danger">
        <span class="glyphicon glyphicon-remove"></span>
        <em>{!! Session::get('warning_msg') !!}</em>
    </div>
    @endif
   
    <table class="responstable">
        <thead>
          <tr>
            <th class="text  text-primary">Cliente          </th>
            <th class="text  text-primary">Ref de servicio  </th>
            <th class="text  text-primary">Serie            </th>
            {{-- <th class="text  text-success">Articulos </th> --}}
            <th class="text  text-primary">Marca            </th>
            <th class="text  text-primary">Modelo           </th>
            <th class="text  text-primary">Almacen          </th>
            <th class="text  text-primary">Opcion           </th>
            <th class="text  text-primary">Opcion           </th>

           </tr>
      
        </thead>
        <tbody>
      
        @foreach ($articulos as $articulo)
            <tr> 
            <td data-label="Cliente"> {{ $articulo->cliente_id }}</td>
            <td data-label="Ref de servicio">{{ $articulo->servicio_id}}</td>
            <td data-label="Serie">{{ $articulo->serie}}</td>
            <td data-label="Marca"> {{ $articulo->marca}} </td>
            <td data-label="Modelo">{{ $articulo->modelo }}</td>
            <td data-label="Almacen">{{ $articulo->almacen_compra}} </td>
            <td data-label ="Opcion"><a class=" btn btn-info xs " href="{{ route('articulo.edit', $articulo->id)  }}">Gestionar  </a> </td>
            <td data-label ="Opcion">
                  <form   method="POST" action="{{ route ('articulo.destroy', $articulo->id)  }}">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button class=" btn btn-danger xs " type="submit">Eliminar</button>
                  </form>
            </td>  
          </tr>
      </tbody>
      @endforeach 
      </table>      
</div>

@endsection