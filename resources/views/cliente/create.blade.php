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
                        Clientes!!
                    </span>
                </th>
            </tr>
        </table>
    </div>

    <form action="{{ route('cliente.store') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group col-md-6">
            <label> Nombres </label>
            <input type="text" class="form-control" name="nombre" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
            <label>Apellidos </label>
            <input type="text" class="form-control" name="apellido" placeholder="Last Name">
        </div>

        <div class="form-group col-md-6">
            <label>Mail </label>
            <input type="email" class="form-control" name="email" placeholder="E-mail">
        </div>

        <div class="form-group col-md-6">
                <label> Sexo </label>
                <select class="form-control" name="sexo"  >
                    <option disabled selected> Choose...</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Otro">Otro</option>
    
                </select>
            </div>

        <div class="form-group col-md-6">
            <label>Tipo de Identificación</label>
            <select class="form-control" name="tipo_identificacion">
                <option> Choose...</option>
                <option value="Cedula">Cedula</option>
                <option value="Passport">Passport</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Numero de Identificacion</label>
            <input type="number" class="form-control" name="identificacion" placeholder="text">
        </div>

        <div class="form-group col-md-6">
            <label>Ciudad</label>
            <input type="text" class="form-control" name="ciudad" placeholder="text">
        </div>

        <div class="form-group col-md-6">
            <label>Departamento</label>
            <input type="text" class="form-control" name="departamento" placeholder="text">
        </div>

        <div class="form-group col-md-6">
            <label>Dirección</label>
            <input type="text" class="form-control" name="direccion" placeholder="text">
        </div>

        <div class="form-group col-md-6">
            <label>Tipo de Vivienda </label>
            <select class="form-control" name="tipo_casa"  >
                <option disabled selected> Choose...</option>
                <option value="Casa">Casa</option>
                <option value="Apartamento">Apartamento</option>
                <option value="Edificio">Edificio</option>

            </select>
        </div>

        <div class="form-group col-md-6">
            <label>Barrio</label>
            <input type="text" class="form-control" name="barrio" placeholder="Barrio">
        </div>

        <div class="form-group col-md-6">
            <label>Telefono</label>
            <input type="phone" class="form-control" name="telefono" placeholder="phone">
        </div>

        <div class="form-group col-md-6">
            <label>Telefono (opcional)</label>
            <input type="phone" class="form-control" name="opcional_telefono" placeholder="phone(opcional)">
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Registrar Cliente</button>
        </div>

    </form>
    @endsection