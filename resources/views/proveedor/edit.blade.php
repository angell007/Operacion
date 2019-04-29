
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


<div class="container">
        <div class="form-group col-md-12" style="background-color:#f3f3f3; font-size: 2.3rem;">
                <table>
                    <tr>
                        <th class="text text-default">
                            <span>
                                proveedor!!
                            </span>
                        </th>
                    </tr>
                </table>
            </div>
    
            <form action="{{ route('proveedor.update', $proveedores->id) }}" method="POST">
                {{ csrf_field() }}
                {!!method_field('PUT')!!}
        
                <div class="form-group col-md-6">
                    <label> nombre </label>
                    <input type="text" class="form-control" name="nombre" placeholder="nombre de proveedor"
                    value=" {{ $proveedores->nombre }}">
                </div>

                <div class="form-group col-md-6">
                        <label> nit </label>
                        <input type="text" class="form-control" name="nit" placeholder="nit de proveedor"
                        value=" {{ $proveedores->nit }}">
                </div>

                <div class="form-group col-md-6">
                        <label> direccion </label>
                        <input type="text" class="form-control" name="direccion" placeholder="direccion de proveedor"
                        value=" {{ $proveedores->direccion }}">
                </div>

                <div class="form-group col-md-6">
                        <label> ciudad </label>
                        <input type="text" class="form-control" name="ciudad" placeholder="ciudad de proveedor"
                        value=" {{ $proveedores->ciudad }}">
                </div>

                <div class="form-group col-md-6">
                        <label> telefono </label>
                        <input type="text" class="form-control" name="telefono" placeholder="telefono de proveedor"
                        value=" {{ $proveedores->telefono }}">
                </div>

                <div class="form-group col-md-6">
                        <label> telefono opcional </label>
                        <input type="text" class="form-control" name="telefono_opcional" placeholder="telefono opcional de proveedor"
                        value=" {{ $proveedores->telefono_opcional }}">
                </div>
    
    
                <div class="form-group col-md-12">
                    <label> descripcion  </label>
                <textarea  name="descripcion"  type="text" class="form-control">{{ $proveedores->descripcion }}</textarea>
                </div>
    
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">actualizar  proveedor</button>
                </div>
        
            </form>
@endsection