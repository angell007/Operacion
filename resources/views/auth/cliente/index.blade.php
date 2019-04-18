@extends('layouts.app')
@section('content')
<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3> Clientes</h3>
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

            <div class="panel-body">
                    <form  action="{{route ('search')}}" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group">
                            <input type="text" class="form-control" id="search" name="id" value="">
                            <input type="submit"  class="btn btn-primary xs">
                        </div>
                      </form>
                    </div>

                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Identificacion</th>
                                <th scope="col">Opciones</th>
                                <th scope="col">Opciones</th>

                              </tr>
                            </thead>
                            <tbody>

                                @if ($clientes->isEmpty())
                                    <div>No hay Mensajes</div>
                                @else

                                @foreach ($clientes as $cliente)  
                              <tr>
                                  <th scope="row">{{ $cliente->id }}</th>
                                  <td>  {{ $cliente->nombre .' '. $cliente->apellido }}   </td>
                                  <td>  {{ $cliente->identificacion }}   </td>
              
                                  <td data-label="Opcion"><a class = " btn btn-info xs " href="{{ route('cliente.show', $cliente->id) }}"> Mostrar </a> </td>
                                  <td>
                                        <div class="form-group">
                                            <form  class="form-group" method = "POST" action="{{ route ('cliente.destroy', $cliente->id) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class = " btn btn-danger xs " type="submit">Eliminar</button>
                                            </form>
                                        </div>
                                  </td> 
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                          </table>                           
    </div>

@endsection
