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
          

                    <table class="respontable">
                            <thead>
                              <tr>
                                {{-- <th scope="col" >#</th> --}}
                                <th >Nombre</th>
                                <th >Identificacion</th>
                                <th >Opcion</th>
                                <th >Opcion</th>
                                {{-- <th scope="col" >Opcion</th> --}}

                              </tr>
                            </thead>
                            <tbody>

                                {{-- @if ($cliente->isEmpty())
                                    <div>No hay Mensajes</div>
                                @else --}}

                              <tr>
                                  {{-- <th scope="row" data-label="#">{{ $cliente->id }}</th> --}}
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
                          
                         
                                @if ($servicios->isEmpty())
                              
                                              
                                             <h3>
                                                 No hay Servicios
                                            </h3>
                                      
                                @else

                                <table class="responstable">
                                        <thead>
                                          <tr>
                                            {{-- <th class="text  text-primary">#</th> --}}
                                            {{-- <th class="text  text-primary">Cliente</th> --}}
                                            <th class="text  text-primary">Tecnico</th>
                                            {{-- <th class="text  text-success">Articulos </th> --}}
                                            <th class="text  text-primary">Pendiente</th>
                                            <th class="text  text-primary">Fecha de inicio</th>
                                            <th class="text  text-primary">Fecha de reparado</th>
                                            <th class="text  text-primary">Fecha de finalizado</th>
                                            <th class="text  text-primary">Opcion</th>
                                            <th class="text  text-primary">Opcion</th>
                                           </tr>
                                      
                                        </thead>
                                        <tbody>
                                      
                                          @foreach ($servicios as $servicio)  
                                          <tr> 
                                         {{-- <td data-label="Opcion"><a class = " btn btn-info xs " href="{{ route ('Materia.show', $Materia->id) }}"> Ver detalles  </a> </td> --}}
                                            {{-- <td data-label="#">{{ $servicio->id }}</td> --}}
                                            {{-- <td data-label="Cliente">{{ $servicio->cliente->identificacion}}</td> --}}
                                            <td data-label="Tecnico">{{ $servicio->customer->identificacion}}</td>
                                            {{-- <td data-label="Articulos">{{ $servicio->articulos->implode('marca', '|| ')}} </td> --}}
                                            <td data-label="Pendiente">{{ $servicio->razonPendiente->nombre}} </td>
                                            <td data-label="Fecha de inicio ">{{ $servicio->fecha_inicio}} </td>
                                            @if (isset($servicio->fecha_reparado))
                                            <td data-label="Fecha de reparado ">{{ $servicio->fecha_reparado}} </td>
                                            @else
                                            <td data-label="Fecha de reparado ">   sin fecha </td>
                                            @endif
                                            @if (isset($servicio->fecha_finalizado))
                                            <td data-label="Fecha de finalizado ">{{ $servicio->fecha_finalizado}} </td>
                                            @else
                                            <td data-label="Fecha de reparado ">   sin fecha </td>
                                            @endif
                                            <td data-label ="Opcion"><a class=" btn btn-info xs " href="{{ route('servicio.edit',encrypt( $servicio->id)) }}">Gestionar {{ $servicio->id}}  </a> </td>
                                          <td data-label ="Opcion">
                                              {{-- <div class="form-group"> --}}
                                                  <form  method="POST" action="{{ route ('servicio.destroy', $servicio->id) }}">
                                                      <input type="hidden" name="_method" value="DELETE">
                                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                      <button class=" btn btn-danger xs "  onclick="return confirm(' ¿Esta seguro que desea eiminar este servicio ?')" type="submit">Eliminar</button>
                                                  </form>
                                              {{-- </div> --}}
                                          </td>  
                                       
                                          </tr>
                                      </tbody>
                                      @endforeach 
                                      </table> 
                                    @endif
                                </tbody>
    </div>

@endsection
