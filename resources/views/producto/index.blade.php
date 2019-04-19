@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table class="table">
                <tr class="form-group">
                    <th scope="col">
                        <h3> productos </h3>
                        <a class=" btn btn-info xs " href="{{ route('producto.create') }}"> Add producto </a>
                    </th>
                </tr>
            </table>
            <div class="panel-body">
                <form action="{{route ('search')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="id" placeholder="documento...">
                        <input type="submit" class="btn btn-primary xs" value="Buscar">
                    </div>
                </form>
            </div>
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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Factura ref</th>
                <th scope="col">Proveedor </th>
                <th scope="col">referencia</th>
                <th scope="col">desripcion</th>
                <th scope="col">costo de entrada </th>
                <th scope="col">cantidad</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($productos as $producto)
            <tr>
                    <th scope="col">{{ $producto->id}}</th>
                    <th scope="col">{{ $producto->factura_id}}</th>
                    <th scope="col">{{ $producto->proveedor_id}}</th>
                    <th scope="col">{{ $producto->referencia}} </th>
                    <th scope="col">{{ $producto->desripcion}}</th>
                    <th scope="col">{{ $producto->costo_entrada}}</th>
                    <th scope="col">{{ $producto->cantidad}}</th>

                <th scope="col" data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('producto.edit', $producto->id) }}">
                        Editar </a> </th>
                <th scope="col">
                    <div class="form-group">
                        <form class="form-group" method="POST" action="{{ route ('producto.destroy', $producto->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class=" btn btn-danger xs " type="submit">Eliminar</button>
                        </form>
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection