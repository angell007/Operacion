@extends('layouts.app')
@section('content')

<div class="container">

    <table class="table">
            <tr class="form-group">
                <th scope="col"><h3> Servicios </h3>
                    <a class = " btn btn-info xs " href="{{ route('servicio.create') }}"> Add Servicio </a>
                    
                </th>
                
            </tr>
          </table>  
           
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

      <table class="table table-bordered table-responsive" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Tecnico</th>
            <th>Articulos </th>
            <th>Pendiente</th>
            <th>Fecha de inicio</th>
            <th></th>
            <th>Opciones</th>

          </tr>
        </thead>
        <tbody>
         {{-- {{ dd($servicios)}} --}}
            @foreach ($servicios as $servicio)  
            <tr>
            <th>{{ $servicio->id }}</th>
            <th class="text text-info">   {{ $servicio->cliente->identificacion}}     </th>
            <th class="text text-info">   {{ $servicio->customer->identificacion}}     </th>
            <th class="text text-warning"> {{ $servicio->articulos->implode('marca', '|| ')}}
            <th class="text text-success"> {{ $servicio->razonPendiente->nombre}}                    </th>
            <th class="text tex-dark" >{{ $servicio->fecha_inicio}} 
              <td data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('servicio.edit', $servicio->id) }}">
                Gestionar  </a> </td>
          <td>
              <div class="form-group">
                  <form class="form-group" method="POST" action="{{ route ('servicio.destroy', $servicio->id) }}">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <button class=" btn btn-danger xs " type="submit">Eliminar</button>
                  </form>
              </div>
          </td>                             </th>
            {{-- // ->pluck('almacen_compra')->implode("|| \n") }} </th> --}}
            {{-- <th class="text text-primary"> {{ $servicio->articulos->pluck('modelo')->implode("|| \n") }}    </th> --}}
          </tr>
            
            

            @endforeach  
        </tbody>
      </table>
    </div>
  
  {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
@endsection