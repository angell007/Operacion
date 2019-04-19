@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table class="table">
                <tr class="form-group">
                    <th scope="col">
                        <h3> Articulos </h3>
                        <a class=" btn btn-info xs " href="{{ route('articulo.create') }}"> Add articulo </a>
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
                <th scope="col">cliente</th>
                <th scope="col">ref de servicio </th>
                <th scope="col">serie</th>
                <th scope="col">marca</th>
                <th scope="col">modelo</th>
                <th scope="col">almacen</th>
                <th scope="col"></th>
                <th scope="col">Opciones</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($articulos as $articulo)
            <tr>
                <th scope="row">{{ $articulo->cliente_id }}</th>
                <td> {{ $articulo->servicio_id}} </td>
                <td> {{ $articulo->serie}} </td>
                <td> {{ $articulo->marca}} </td>
                <td> {{ $articulo->modelo }} </td>
                <td> {{ $articulo->almacen_compra}} </td>

                <td data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('articulo.edit', $articulo->id) }}">
                        Editar </a> </td>
                <td>
                    <div class="form-group">
                        <form class="form-group" method="POST" action="{{ route ('articulo.destroy', $articulo->id) }}">
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