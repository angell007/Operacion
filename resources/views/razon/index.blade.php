@extends('layouts.app')
@section('content')
<div class="container">
        <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">

    <div class="panel panel-default">
        <div class="panel-heading">
            <table >
                <tr class="form-group">
                    <th scope="col">
                        <h3> Razones pendiente </h3>
                        <a class=" btn btn-info xs " href="{{ route('razon.create') }}"> Add razon </a>
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
                {{-- <th class="text  text-primary">Opcion           </th> --}}
                <th class="text  text-primary">Opcion           </th>
               </tr>
            </thead>
            <tbody>
          
        @foreach ($razones as $razon)
                <tr> 
                <td data-label="Nombre"> {{ $razon->nombre}}</td>
                <td data-label="Descripcion">{{ $razon->descripcion}}</td>
                {{-- <td data-label ="Opcion"><a class=" btn btn-info xs " href="{{ route('razon.edit', $razon->id) }}">Gestionar  </a> </td> --}}
                <td data-label ="Opcion">
                      <form   method="POST" action="{{ route ('razon.destroy', $razon->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @if($razon->id==1)
                          @else 
                          <button class=" btn btn-danger xs " type="submit" onclick="return confirm(' ¿Esta seguro que desea eiminar esta razon pendiente ?')">Eliminar</button>
                          @endif
                          
                      </form>
                </td>  
              </tr>
          </tbody>
        @endforeach 
    </table>     
</div>

@endsection