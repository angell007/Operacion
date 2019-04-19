@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table class="table">
                <tr class="form-group">
                    <th scope="col">
                        <h3> proveedores </h3>
                        <a class=" btn btn-info xs " href="{{ route('proveedor.create') }}"> Add proveedor </a>
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
                <th scope="col">Nombre</th>
                <th scope="col"> Descripcion </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($proveedores as $proveedor)
            <tr>
                <td> {{ $proveedor->id}} </td>
                <th scope="row">{{ $proveedor->nombre}}</th>
                <td> {{ $proveedor->descripcion}} </td>


                <td data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('proveedor.edit', $proveedor->id) }}">
                        Editar </a> </td>
                <td>
                    <div class="form-group">
                        <form class="form-group" method="POST" action="{{ route ('proveedor.destroy', $proveedor->id) }}">
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