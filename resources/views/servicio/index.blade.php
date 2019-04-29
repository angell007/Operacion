@extends('layouts.app')
@section('content')

<div class="container">
  <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">
  <div class="">
      <div class="">
         
           
          <table class="respontable">
              <tr class="">
                <td>
                    <h3>
                        Servicio!!   
                     </h3>
                </td>
                  <td>
                      {{-- <h3> Servicios </h3> --}}
                      <a class = " btn btn-info xs " href="{{ route('servicio.create') }}"> Add Servicio </a>
                  </td>
                    <td>  
                  <a  class = " btn btn-info xs " href="{{  route('tecnico') }}">
                          Add Service technical
                      </a>
                    </td>
              </tr>
          </table>
         
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

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            
          <table class="responstable">
            <thead>
              <tr>
                <th class="text  text-primary">#</th>
                <th class="text  text-primary">Cliente</th>
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
                <td data-label="#">{{ $servicio->id }}</td>
                <td data-label="Cliente">{{ $servicio->cliente->identificacion}}</td>
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
    </div>
  
  {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
@endsection