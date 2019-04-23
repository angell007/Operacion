@extends('layouts.app')
@section('content')
<div class="container">
        <link href="{{ asset('css/tableindex.css') }}" rel="stylesheet">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table >
                <tr class="form-group">
                    <th scope="col">
                        <h3> Clientes</h3>
                        <a class=" btn btn-info xs " href="{{ route('cliente.create') }}"> Add Cliente </a>
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
                <th scope="col">Identificacion</th>
                <th scope="col">Opciones</th>
                <th scope="col">Opciones</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($clientes as $cliente)
            <tr>
                <td data-label="#"> {{ $cliente->id }}</td>
                <td data-label="Nomnbre"> {{ $cliente->nombre .' '. $cliente->apellido }} </td>
                <td data-label="Identificacion"> {{ $cliente->identificacion }} </td>

                <td data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('cliente.show', $cliente->id) }}">
                        Mostrar </a> </td>
                <td data-label="Opcion">
                        <form method="POST" action="{{ route ('cliente.destroy', $cliente->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class=" btn btn-danger xs " type="submit">Eliminar</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection