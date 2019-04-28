@extends('layouts.app')
@section('content')
<div class="container">
        <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">
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
            {{-- <div class="panel-body">
                <form action="{{route ('search')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="id" placeholder="documento...">
                        <input type="submit" class="btn btn-primary xs" value="Buscar">
                    </div>
                </form>
            </div> --}}
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
    <table class="responstable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Factura ref</th>
                <th scope="col">Proveedor </th>
                <th scope="col">referencia</th>
                <th scope="col">desripcion</th>
                <th scope="col">costo de entrada </th>
                <th scope="col">cantidad</th>
                <th scope="col">Opcion</th>
                <th scope="col">Opcion</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($productos as $producto)
            <tr>
                    <td scope="col" data-label="#">{{ $producto->id}}</td>
                    <td scope="col" data-label="factura ref ">{{ $producto->factura_id}}</td>
                    <td scope="col" data-label="proveedor">{{ $producto->proveedor_id}}</td>
                    <td scope="col" data-label="referencia">{{ $producto->referencia}} </td>
                    <td scope="col" data-label="descripcion">{{ $producto->descripcion}}</td>
                    <td scope="col" data-label="costo de entrada ">{{ $producto->costo_entrada}}</td>
                    <td scope="col" data-label="cantidad">{{ $producto->cantidad}}</td>

                <td scope="col" data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('producto.edit', $producto->id) }}">
                        Editar </a> </td>
                <td scope="col" data-label="Opcion">
                    <div class="form-group">
                        <form class="form-group" method="POST" action="{{ route ('producto.destroy', $producto->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class=" btn btn-danger xs " type="submit">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection