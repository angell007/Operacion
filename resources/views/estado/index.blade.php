@extends('layouts.app')
@section('content')
<div class="container">
        <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table >
                <tr class="form-group">
                    <th scope="col">
                        <h3> Estados </h3>
                        <a class=" btn btn-info xs " href="{{ route('estado.create') }}"> Add estado </a>
                    </th>
                </tr>
            </table>
            {{-- <div class="panel-body">
                <form action="{{route ('search')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="id" placeholder="documento...">
                        <input type="submit" class="btn btn-primary xs" value="Buscar">
                    </div>
                </form>
            </div> --}}
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
                <th class="text  text-primary">Nombre           </th>
                <th class="text  text-primary">Descripcion      </th>
                <th class="text  text-primary">Opcion           </th>
                {{-- <th class="text  text-primary">Opcion           </th> --}}
               </tr>
            </thead>
            <tbody>
          
        @foreach ($estados as $estado)
                <tr> 
                <td data-label="Nombre"> {{ $estado->nombre}}</td>
                <td data-label="Descripcion">{{ $estado->descripcion}}</td>
                {{-- <td data-label ="Opcion"><a class=" btn btn-info xs " href="{{ route('estado.edit', $estado->id) }}">Gestionar  </a> </td> --}}
                <td data-label ="Opcion">
                      <form   method="POST" action="{{ route ('estado.destroy', $estado->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button class=" btn btn-danger xs " type="submit" onclick="return confirm(' ¿Esta seguro que desea eiminar este Estado de pedido ?')">Eliminar</button>
                      </form>
                </td>  
              </tr>
          </tbody>
        @endforeach 
    </table>     
</div>

@endsection