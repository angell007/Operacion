@extends('layouts.app')
@section('content')
<div class="container">
        <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">

    <div class="panel panel-default">
        <div class="panel-heading">
            {{-- <table>
                <tr class="form-group">
                    <th>
                        <h3> Articulos </h3>
                        <a class=" btn btn-info xs " href="{{ route('articulo.create') }}"> Add articulo </a>
                    </th>
                </tr>
            </table> --}}
            <div class="panel-body">
                    <form action="{{route ('ArticuloSearch')}}" method="POST">
                        {{ csrf_field() }}
    
                        
                        <div class="form-group col-md-4">
                            <select name ="filtro" class="form-control">
                                <option value="Tipo">
                                   Tipo
                                </option>
                                <option value="Modelo">
                                    Modelo
                                </option>
                                <option value="Marca">
                                    Marca
                                </option>
                            </select>
                        </div>
    
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control"  name="id" placeholder="Buscar...">
                        </div>
                        <div class="form-group col-md-2">
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
            {{-- <th class="text  text-primary">Cliente          </th> --}}
            {{-- <th class="text  text-primary">Ref de servicio  </th> --}}
            <th class="text  text-default">Serie            </th>
            <th class="text  text-default">Marca            </th>
            <th class="text  text-default">Modelo           </th>
            <th class="text  text-default">tipo             </th>
            <th class="text  text-default">Almacen          </th>
            <th class="text  text-default">Opcion           </th>
            <th class="text  text-default">Opcion           </th>

           </tr>
      
        </thead>
        <tbody>
      
        @foreach ($articulos as $articulo)
            <tr> 
            {{-- <td data-label="Cliente"> {{ $articulo->cliente_id }}</td> --}}
            {{-- <td data-label="Ref de servicio">{{ $articulo->servicio_id}}</td> --}}
            <td data-label="Serie">{{ $articulo->serie}}</td>
            <td data-label="Marca"> {{ $articulo->marca}} </td>
            <td data-label="Modelo">{{ $articulo->modelo }}</td>
            <td data-label="Tipo">{{ $articulo->tipo}}</td>
            <td data-label="Almacen">{{ $articulo->almacen_compra}} </td>
            <td data-label ="Opcion"><a class=" btn btn-info xs " href="{{ route('articulo.edit', $articulo->id)  }}">Gestionar  </a> </td>
            <td data-label ="Opcion">
                  <form   method="POST" action="{{ route ('articulo.destroy', $articulo->id)  }}">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button class=" btn btn-danger xs " type="submit" onclick="return confirm(' ¿Esta seguro que desea eiminar este Articulo ?')">Eliminar</button>
                  </form>
            </td>  
          </tr>
      </tbody>
      @endforeach 
      </table>      
</div>

@endsection