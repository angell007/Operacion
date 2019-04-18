@extends('layouts.app')
@section('content')
<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3> Cliente</h3>
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

                                {{-- @if ($cliente->isEmpty())
                                    <div>No hay Mensajes</div>
                                @else --}}

                              <tr>
                                  <th scope="row">{{ $cliente->id }}</th>
                                  <td>  {{ $cliente->nombre .' '. $cliente->apellido }}   </td>
                                  <td>  {{ $cliente->identificacion }}   </td>
              
                                  <td data-label="Opcion"><a class = " btn btn-info xs " href="{{ route('/servicio.create') }}"> Add Servicio </a> </td>
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
                                {{-- @endif --}}
                            </tbody>
                          </table>    
                          
                          <div class="form-group col-md-12" style="background-color:#f3f3f3; font-size: 2.3rem;">
                                  <table>
                                      <tr>
                                          <th class="text text-default">
                                              <span>
                                                  Servicios del cliente !!
                                              </span>
                                          </th>
                                      </tr>
                                  </table>
                              </div>
                          
                          <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fecha de Inicio</th>
                                    <th scope="col">Valor cotizado</th>
                                    <th scope="col">Opciones</th>
                                    <th scope="col">Opciones</th>

                                  </tr>
                                </thead>
                                <tbody>

                                @if ($servicios->isEmpty())
                                <thead>
                                        <tr>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
                                          <th scope="col"></th>
      
                                        </tr>
                                      </thead>
                                    {{-- <div class="alert-danger">No hay Servicios</div> --}}
                                @else

                               @foreach ($servicios as $servicio)
                                   
                              
                                  <tr>
                                      <th scope="row">{{ $servicio->id }}</th>
                                      <td>  {{ $servicio->fecha_inicio}}   </td>
                                      <td>  {{ $servicio->valor_cotizado }}   </td>
                  
                                      <td data-label="Opcion"><a class = " btn btn-info xs " href="{{ route('cliente.show', $servicio->id) }}"> Mostrar </a> </td>
                                      <td>
                                            <div class="form-group">
                                                <form  class="form-group" method = "POST" action="{{ route ('cliente.destroy', $servicio->id) }}">
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
