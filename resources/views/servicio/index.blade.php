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

      <table class="table table-bordered table-responsive" width="100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Tecnico</th>
            <th>Articulos </th>
            <th>Pendiente</th>
            <th>Fecha de inicio</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($servicios as $servicio)  
            <tr>


            <th>{{ $servicio->id }}</th>
            <th class="text text-danger">  {{ dd($servicio->cliente->id) }}   </th>
            {{-- <th class="text text-info">   {{ $servicio->customer->id}}     </th> --}}
            {{-- <th class="text text-success"> {{  }}dd($servicio->customer->nombre) }}      </th> --}}
            <th class="text text-warning"> {{ $servicio->articulos->implode('marca', '|| ')}}
            {{-- // ->pluck('almacen_compra')->implode("|| \n") }} </th> --}}
            <th class="text text-success"> {{ $servicio->razonPendiente->nombre}}                    </th>
            {{-- <th class="text text-primary"> {{ $servicio->articulos->pluck('modelo')->implode("|| \n") }}    </th> --}}
            <th class="text tex-dark" >{{ $servicio->fecha_inicio}}                              </th>
          </tr>
            
            

            @endforeach  
        </tbody>
      </table>
    </div>
  
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
@endsection