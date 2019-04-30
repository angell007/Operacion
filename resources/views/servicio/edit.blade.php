@extends('layouts.app')
@section('content')

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

<div class="container">
    <div class="form-group col-md-12" style="background-color:#f3f3f3; font-size: 2.3rem;">
        <table>
            <tr>
                <th class="text text-default">
                    <span>
                        Servicio!!
                    </span>
                </th>
            </tr>
        </table>
    </div>
    
    @foreach ($servicio as $servicio)
    
    <div class="form-group col-md-12">
        {{-- <a class=" btn btn-info xs " href="#">Add Producto </a> --}}
        <td data-label="Opcion"><a class = " btn btn-info xs " href="{{ route('addArticulo', encrypt($servicio->id)) }}"> Add Articulo</a> </td>
    </div>
    
    <form action="{{ route('servicio.update', $servicio->id) }}" method="POST">
        {!!method_field('PUT')!!}
        {{ csrf_field() }}
        
        {{-- @if (isset( $servicio->productos))
        <div class="form-group col-md-6">
            <label > Productos asociados a este servicio</label>
                <ul>
                        @foreach ($servicio->productos as $item)
                            <li> 
                            <a href="{{ route('articulo.edit', $item->id)  }}">   {{ $item->serie }} </a> 
                            </li>
                        @endforeach
                </ul>
        </div>
        @else
        <div class="form-group col-md-6">
                <label > Productos asociados a este servicio</label>
            </div>
        @endif --}}

        @if (isset( $servicio->articulos))
        <div class="form-group col-md-6">
            <label > articulos asociados a este servicio</label>
                <ul>
                        @foreach ($servicio->articulos as $item)
                            <li> 
                            <a href="{{ route('articulo.edit', $item->id)  }}">   {{ $item->serie }} </a> 
                            </li>
                        @endforeach
                </ul>
        </div>
        @else
        <div class="form-group col-md-6">
                <label > articulos asociados a este servicio</label>
            </div>
        @endif

        @if (isset($servicio->razonPendiente->nombre))
        <div class="form-group col-md-6">
            <label>Razon pendiente </label>
            <select class="form-control" name="razon_pendiente_id">
                <option disabled selected value="{{ $servicio->razonPendiente->id }}">
                    {{ $servicio->razonPendiente->nombre }}
                </option>
                @foreach ($pendientes as $item)
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
        </div>
        @else

        <div class="form-group col-md-6">
            <label>Razon pendiente </label>
            <select class="form-control" name="razon_pendiente_id">
                <option disabled selected> No hay pendientes </option>
                @foreach ($pendientes as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if (isset($servicio->tipoServicio->nombre))
        <div class="form-group col-md-6">
            <label>Tipo de servicio </label>
            <select class="form-control" name="tipo_servicio_id">
                <option value="{{ $servicio->tipoServicio->id }}">{{ $servicio->tipoServicio->nombre }}</option>
            </select>
        </div>
        @else

        <div class="form-group col-md-6">
            <label>Tipo de servicio </label>
            <select class="form-control">
                <option> No hay tipos de servicio </option>
            </select>
        </div>
        @endif

        @if (isset($servicio->modoServicio->nombre))
        <div class="form-group col-md-6">
            <label>modo de servicio </label>
            <select class="form-control" name="modo_servicio_id">
                <option value="{{ $servicio->modoServicio->id }}">{{ $servicio->modoServicio->nombre }}</option>
            </select>
        </div>
        @else

        <div class="form-group col-md-6">
            <label>modo de servicio </label>
            <select class="form-control">
                <option> No hay modos de servicio </option>
            </select>
        </div>
        @endif

        @if (isset($servicio->cliente->identificacion))
        <div class="form-group col-md-6">
            <label>identificacion de cliente </label>
            <select class="form-control" name="cliente_id">
                <option value="{{ $servicio->cliente->identificacion }}">{{ $servicio->cliente->identificacion }}
                </option>
            </select>
        </div>
        @else

        <div class="form-group col-md-6">
            <label>identificacion de cliente </label>
            <select class="form-control" name="cliente_id">
                <option> No hay cliente </option>
            </select>
        </div>
        @endif

        @if (isset($servicio->customer->identificacion))
        <div class="form-group col-md-6">
            <label>identificacion de customer </label>
            <select class="form-control" name="customer_id">
                <option value="{{ $servicio->customer->identificacion }}">{{ $servicio->customer->identificacion }}
                </option>
                @foreach ($usuarios as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        @else

        <div class="form-group col-md-6">
            <label>identificacion de customer </label>
            <select class="form-control" name="customer_id">
                <option> No hay customer </option>
                @foreach ($usuarios as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if (isset($servicio->fecha_inicio))
        <div class="form-group col-md-6">
            <label>fecha inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" placeholder="fecha inicio "
                value="{{ $servicio->fecha_inicio }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label> fecha inicio </label>
            <input type="date" class="form-control" name="fecha_inicio" placeholder="fecha inicio ">
        </div>
        @endif

        <div class="form-group col-md-6">
            <label> ubicacion del producto </label>
            <input type="text" class="form-control" name="ubicacion_producto" placeholder="ubicacion del producto ">
        </div>


        @if (isset($servicio->fecha_reparado))
        <div class="form-group col-md-6">
            <label>fecha reparado</label>
            <input type="date" class="form-control" name="fecha_reparado" placeholder="fecha reparado "
                value="{{ $servicio->fecha_reparado }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label> fecha reparado </label>
            <input type="date" class="form-control" name="fecha_reparado" placeholder="fecha finalizado" 
            value="{{ $servicio->fecha_reparado }}">
        </div>
        @endif

        @if (isset($servicio->fecha_finalizado))
        <div class="form-group col-md-6">
            <label>fecha finalizado</label>
            <input type="date" class="form-control" name="fecha_finalizado" placeholder="fecha finalizado "
                value="{{ $servicio->fecha_finalizado }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label> fecha finalizado </label>
            <input type="date" class="form-control" name="fecha_finalizado" placeholder="fecha finalizado ">
        </div>
        @endif

        @if (isset($servicio->mano_obra))
        <div class="form-group col-md-6">
            <label>valor de mano_obra </label>
            <input type="number" class="form-control" name="mano_obra" placeholder="valor mano de obra"
                value="{{ $servicio->mano_obra }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label>valor de mano_obra </label>
            <input type="number" class="form-control" name="mano_obra" placeholder="valor mano de obra">
        </div>
        @endif

        @if (isset($servicio->valor_asegurado_producto))
        <div class="form-group col-md-6">
            <label>valor  asegurado producto </label>
            <input type="number" class="form-control" name="valor_asegurado_producto" placeholder="valor mano de obra"
                value="{{ $servicio->valor_asegurado_producto }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label>valor de valor asegurado producto </label>
            <input type="number" class="form-control" name="valor_asegurado_producto" placeholder="valor mano de obra">
        </div>
        @endif

        @if (isset($servicio->valor_cotizado))
        <div class="form-group col-md-6">
            <label>valor de valor_cotizado </label>
            <input type="number" class="form-control" name="valor_cotizado" placeholder="valor mano de obra"
                value="{{ $servicio->valor_cotizado }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label>valor de valor_cotizado </label>
            <input type="number" class="form-control" name="valor_cotizado" placeholder="valor mano de obra">
        </div>
        @endif

        @if (isset($servicio->valor_total))
        <div class="form-group col-md-6">
            <label>valor de valor total </label>
            <input type="number" class="form-control" name="valor_total" placeholder="vvalor"
                value="{{ $servicio->valor_total }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label>valor de valor total </label>
            <input type="number" class="form-control" name="valor_total" placeholder="vvalor">
        </div>
        @endif
        {{-- {{ dd($servicio->happy_call_estado)  }} --}}
        @if (isset($servicio->happy_call_estado))
        <div class="form-group col-md-6">
            <label>happy call estado </label>
            <input type="text" class="form-control" name="happy_call_estado" placeholder="happy call estado"
                value="{{ $servicio->happy_call_estado }}">

        </div>
        @else
        <div class="form-group col-md-6">
            <label>happy call estado </label>
            <input type="text" class="form-control" name="happy_call_estado" placeholder="happy call estado">
        </div>
        @endif

        @if (isset($servicio->happy_call_calificacion))
        <div class="form-group col-md-6">
            <label>happy call calificacion </label>
            <input type="number" class="form-control" name="happy_call_calificacion" placeholder="vvalor"
                value="{{ $servicio->happy_call_calificacion }}">
        </div>
        @else

        <div class="form-group col-md-6">
            <label>happy call calificacion </label>
            <input type="text" class="form-control" name="happy_call_calificacion" placeholder="valor">
        </div>
        @endif

        @if (isset($servicio->reporte_tecnico))
        <div class="form-group col-md-6">
            <label>reporte tecnico </label>
            <textarea name="reporte_tecnico" type="text"
                class="form-control">{{ $servicio->reporte_tecnico }}</textarea>
        </div>
        @else

        <div class="form-group col-md-6">
            <label>reporte tecnico </label>
            <textarea name="reporte_tecnico" type="text" class="form-control"></textarea>
        </div>
        @endif



        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Guardar Servicio</button>
        </div>

    </form>
    @endforeach

</div>
@endsection