
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

    <form action="{{ route('articulo.update', $articulos->id) }}" method="POST">
        {{ csrf_field() }}
        {!!method_field('PUT')!!}

  <div class="form-group col-md-6">
            <label> marca </label>
            <input type="text" class="form-control" name="marca" placeholder="marca" value=" {{ $articulos->marca }}">
        </div>

        <div class="form-group col-md-6">
            <label> modelo </label>
            <input type="text" class="form-control" name="modelo" placeholder="modelo" value=" {{ $articulos->modelo }}">
        </div>
        @if (isset($articulos->tipo))
        <div class="form-group col-md-6">
            <label> tipo </label>
            <select class="form-control" name="tipo">
                <option value="{{ $articulos->tipo }}">{{ $articulos->tipo }}</option>
                    <option value="movil">movil</option>
                    <option value="table">table</option>
                    <option value="pc de mesa">pc de mesa</option>
                    <option value="pc portatil">pc portatil</option>
                    <option value="otro">otro</option>
            </select>
        </div>
        @else

        <div class="form-group col-md-6">
            <label>Tipo </label>
            <select class="form-control" name="tipo">
                <option value="movil">movil</option>
                <option value="table">table</option>
                <option value="pc de mesa">pc de mesa</option>
                <option value="pc portatil">pc portatil</option>
                <option value="otro">otro</option>
            </select>
        </div>
        @endif

        <div class="form-group col-md-6">
            <label> serie </label>
            <input type="text" class="form-control" name="serie" placeholder="serie" value=" {{ $articulos->serie }}">
        </div>

        <div class="form-group col-md-6">
            <label> imei </label>
            <input type="text" class="form-control" name="imei1" placeholder="imei" value=" {{ $articulos->imei1 }}">
        </div>

        <div class="form-group col-md-6">
            <label> imei2 </label>
            <input type="text" class="form-control" name="ime2" placeholder="ime2" value=" {{ $articulos->ime2 }}">
        </div>

        <div class="form-group col-md-6">
            <label> almacen de Procedencia </label>
            <input type="text" class="form-control" name="almacen_compra" placeholder="almacen de Procedencia" value=" {{ $articulos->almacen_compra }}">
        </div>

        <div class="form-group col-md-6">
            <label> numero de factura de procedencia </label>
            <input type="number" class="form-control" name="numero_factura_compra"
                placeholder="numero de factura de procedencia" value= {{ intval( $articulos->numero_factura_compra) }}>
        </div>

        <div class="form-group col-md-6">
            <label> numero de garantia </label>
            <input type="number" class="form-control" name="numero_vertificado_garantia" 
            placeholder="numero de garantia" value={{ $articulos->numero_vertificado_garantia }}>
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Update Articulo</button>
        </div>

    </form> 
</div> 
@endsection