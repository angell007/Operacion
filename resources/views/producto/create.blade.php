
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
                               Producto !!
                            </span>
                        </th>
                    </tr>
                </table>
            </div>
    
            <form action="{{ route('producto.store') }}" method="POST">
                {{ csrf_field() }}
    
                <div class="form-group col-md-6">
                    <label> Factura de referencia </label>
                    <input type="text" class="form-control" name="factura_id" placeholder="Faactura de Referencia">
                </div>
    
                <div class="form-group col-md-6">
                    <label> Referencia de Proveedor </label>
                    <input type="text" class="form-control" name="proveedor_id" placeholder="Referencia de Proveedor ">
                </div>
    
                <div class="form-group col-md-6">
                    <label> Referencia </label>
                    <input type="text" class="form-control" name="referencia" placeholder="Referencia">
                </div>
    
                
                <div class="form-group col-md-6">
                    <label> Costo de entrada</label>
                    <input type="number" class="form-control" name="costo_entrada" placeholder="Referencia de Proveedor ">
                </div>
                
                <div class="form-group col-md-6">
                    <label>cantidad </label>
                    <input type="number" class="form-control" name="cantidad" placeholder="cantidad ">
                </div>
                
                <div class="form-group col-md-12">
                    <label> descripcion  </label>
                <textarea  name="descripcion"  type="text" class="form-control">
                </textarea>
                </div>
                
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">Registrar producto</button>
                </div>
        
            </form> 
@endsection