
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
                        Articulo!!
                    </span>
                </th>
            </tr>
        </table>
    </div>

    <form action="{{ route('articulo.store') }}" method="POST">
        {{ csrf_field() }}

        @if (isset($clientes))
        <div class="form-group col-md-6">
            <label>identificacion de cliente </label>
            <select class="form-control" name="cliente_id">
                <option disabled selected> Choose...</option>
                @foreach ($clientes as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        @else

        <div class="form-group col-md-6">
                <label>identificacion de cliente </label>
                @if (isset ($cliente)) 
                    <input type="text" class="form-control" name="cliente_id" value="{{ $cliente->identificacion }}">
                @endif
        </div>
        @endif


        <div class="form-group col-md-6">
            <label> Referencia de servicio </label>
            <input type="number" class="form-control" name="servicio_id" placeholder="Referencia de servicio">
        </div>

        <div class="form-group col-md-6">
            <label> marca </label>
            <input type="text" class="form-control" name="marca" placeholder="marca">
        </div>

        <div class="form-group col-md-6">
            <label> modelo </label>
            <input type="text" class="form-control" name="modelo" placeholder="modelo">
        </div>

        <div class="form-group col-md-6">
            <label> serie </label>
            <input type="text" class="form-control" name="serie" placeholder="serie">
        </div>

        <div class="form-group col-md-6">
            <label> imei </label>
            <input type="text" class="form-control" name="imei1" placeholder="imei">
        </div>

        <div class="form-group col-md-6">
            <label> imei2 </label>
            <input type="text" class="form-control" name="ime2" placeholder="ime2">
        </div>

        <div class="form-group col-md-6">
            <label> almacen de Procedencia </label>
            <input type="text" class="form-control" name="almacen_compra" placeholder="almacen de Procedencia">
        </div>

        <div class="form-group col-md-6">
            <label> numero de factura de procedencia </label>
            <input type="text" class="form-control" name="numero_factura_compra"
                placeholder="numero de factura de procedencia">
        </div>

        <div class="form-group col-md-6">
            <label> numero de garantia </label>
            <input type="text" class="form-control" name="numero_vertificado_garantia" placeholder="numero de garantia">
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Registrar Articulo</button>
        </div>

    </form> 
</div> 
@endsection