@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <table class="table">
                <tr class="form-group">
                    <th scope="col">
                        <h3> Cargos </h3>
                        <a class=" btn btn-info xs " href="{{ route('cargo.create') }}"> Add cargo </a>
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
                <th scope="col">nombre</th>
                <th scope="col">descripcion </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cargos as $cargo)
            <tr>
                <th scope="row">{{ $cargo->nombre}}</th>
                <td> {{ $cargo->descripcion}} </td>
               

                <td data-label="Opcion"><a class=" btn btn-info xs " href="{{ route('cargo.edit', $cargo->id) }}">
                        Editar </a> </td>
                <td>
                    <div class="form-group">
                        <form class="form-group" method="POST" action="{{ route ('cargo.destroy', $cargo->id) }}">
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