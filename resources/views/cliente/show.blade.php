@extends('layouts.app')
@section('content')
<div class="container">
        <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">
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

            <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
                    {{ csrf_field() }}
                    {!!method_field('PUT')!!}

                    <div class="form-group col-md-6">
                        <label> Nombres </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Name"
                        value="{{ $cliente->nombre }} ">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Apellidos </label>
                        <input type="text" class="form-control" name="apellido" placeholder="Last Name"
                        value="{{ $cliente->apellido }} ">
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Mail </label>
                        <input type="email" class="form-control" name="email" placeholder="E-mail"
                        value="{{ $cliente->email }} ">
                    </div>
            
                    <div class="form-group col-md-6">
                            <label> Sexo </label>
                            <select class="form-control" name="sexo"  >
                                <option disabled selected>{{ $cliente->sexo }} </option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                                <option value="Otro">Otro</option>
                
                            </select>
                        </div>
            
                    <div class="form-group col-md-6">
                        <label>Tipo de Identificación</label>
                        <select class="form-control" name="tipo_identificacion">
                            <option> {{ $cliente->tipo_identificacion }}  </option>
                            <option value="1">Cedula</option>
                            <option value="2">Passport</option>
                            <option value="3">Otro</option>
                        </select>
                    </div>
            {{-- {{ dd($cliente) }} --}}
                    <div class="form-group col-md-6">
                        <label>Numero de Identificacion</label>
                        <input type="text" class="form-control" name="identificacion"
                        value="{{ $cliente->identificacion }} ">
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" placeholder="text"
                        value="{{ $cliente->ciudad}} ">
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Departamento</label>
                        <input type="text" class="form-control" name="departamento" placeholder="text"
                        value="{{ $cliente->departamento }} ">
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Dirección</label>
                        <input type="text" class="form-control" name="direccion" placeholder="text"
                        value="{{ $cliente->direccion }} ">
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Tipo de Vivienda </label>
                        <select class="form-control" name="tipo_casa"  >
                            <option disabled selected> {{ $cliente->tipo_casa }} </option>
                            <option value="Casa">Casa</option>
                            <option value="Apartamento">Apartamento</option>
                            <option value="Edificio">Edificio</option>
            
                        </select>
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Barrio</label>
                        <input type="text" class="form-control" name="barrio" placeholder="Barrio"
                        value="{{ $cliente->barrio }} ">

                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Telefono</label>
                        <input type="phone" class="form-control" name="telefono" placeholder="phone"
                        value="{{ $cliente->telefono }} ">
                    </div>
            
                    <div class="form-group col-md-6">
                        <label>Telefono (opcional)</label>
                        <input type="phone" class="form-control" name="opcional_telefono" placeholder="phone(opcional)"
                        value="{{ $cliente->opcional_telefono }} ">
                    </div>
            
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                    </div>
            </form>
          

                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" >#</th>
                                <th scope="col" >Nombre</th>
                                <th scope="col" >Identificacion</th>
                                <th scope="col" >Opcion</th>
                                <th scope="col" >Opcion</th>
                                {{-- <th scope="col" >Opcion</th> --}}

                              </tr>
                            </thead>
                            <tbody>

                                {{-- @if ($cliente->isEmpty())
                                    <div>No hay Mensajes</div>
                                @else --}}

                              <tr>
                                  <th scope="row" data-label="#">{{ $cliente->id }}</th>
                                  <td data-label="Nombre" >  {{ $cliente->nombre .' '. $cliente->apellido }}   </td>
                                  <td data-label="Identificacion">  {{ $cliente->identificacion }}   </td>
                                  <td data-label="Opcion"><a class = " btn btn-info xs " href="{{ route('addServicio', encrypt($cliente->identificacion )) }}"> Add Servicio </a> </td>
                                  {{-- <td data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('cliente.edit', $cliente->id) }}"> Modificar </a> </td> --}}
                                  <td data-label="Opcion">
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
                                        <tr class="alert-danger">
                                          <th  colspan =  "5" scope="col">
                                              
                                              No hay Servicios
                                        </th> 
      
                                        </tr>
                                      </thead>
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
