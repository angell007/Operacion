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

        <div class="form-group col-md-12" style="background-color:#fff; border: darkgray 1px solid;">
            <span>
                Sexo
            </span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sexo" value="1">
                <label class="form-check-label">
                    Male
                </label>
                <input class="form-check-input" type="checkbox" name="sexo" value="2">
                <label class="form-check-label" value="2">
                    Female
                </label>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label>Tipo de Identificación</label>
            <select class="form-control" name="tipo_identificacion">
                <option> Choose...</option>
                <option value="1">Cedula</option>
                <option value="2">Passport</option>
                <option value="3">Otro</option>
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
            <select class="form-control" name="tipo_casa">
                <option> Choose...</option>
                <option value="1">Usada</option>
                <option value="2">Nueva</option>
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

    <div class="form-group col-md-12" style="background-color:#f3f3f3; font-size: 2.3rem;">
        <table>
            <tr>
                <th class="text text-default">
                    <span>
                        Usuarios!!
                    </span>
                </th>
            </tr>
        </table>
    </div>

    <form action="{{ route('user.store') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group col-md-6">
            <label> Nombres </label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>

        <div class="form-group col-md-6">
            <label>Mail </label>
            <input type="email" class="form-control" name="email" placeholder="E-mail">
        </div>

        <div class="form-group col-md-6">
            <label>Password </label>
            <input type="password" class="form-control" name="password" placeholder="password">
        </div>

        <div class="form-group col-md-6">
            <label>Cargo</label>
            <select class="form-control" name="cargo_id">
                <option> Choose...</option>
                <option value="1">Tecnico</option>
                <option value="2">Developer</option>
                <option value="3">Diseñador</option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
        </div>

    </form>

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

    <form action="{{ route('articulo.store') }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group col-md-6">
            <label> Doumento del cliente </label>
            <input type="text" class="form-control" name="cliente_id" placeholder="Doumento del cliente ">
        </div>
        <div class="form-group col-md-6">
            <label> Referencia de servicio </label>
            <input type="text" class="form-control" name="servicio_id" placeholder="Referencia de servicio">
        </div>

        <div class="form-group col-md-6">
            <label> marca </label>
            <input type="text" class="form-control" name="marca" placeholder="marca">
        </div>

        <div class="form-group col-md-6">
            <label> modelo </label>
            <input type="text" class="form-control" name="modelo" placeholder="modelo">
        </div>

        <div class="form-group col-md-6">
            <label> serie </label>
            <input type="text" class="form-control" name="serie" placeholder="serie">
        </div>

        <div class="form-group col-md-6">
            <label> imei </label>
            <input type="text" class="form-control" name="imei1" placeholder="imei">
        </div>

        <div class="form-group col-md-6">
            <label> imei2 </label>
            <input type="text" class="form-control" name="ime2" placeholder="ime2">
        </div>

        <div class="form-group col-md-6">
            <label> almacen de Procedencia </label>
            <input type="text" class="form-control" name="almacen_compra" placeholder="almacen de Procedencia">
        </div>

        <div class="form-group col-md-6">
            <label> numero de factura de procedencia </label>
            <input type="text" class="form-control" name="numero_factura_compra"
                placeholder="numero de factura de procedencia">
        </div>

        <div class="form-group col-md-6">
            <label> numero de garantia </label>
            <input type="text" class="form-control" name="numero_vertificado_garantia" placeholder="numero de garantia">
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Registrar Articulo</button>
        </div>

    </form>

    <div class="form-group col-md-12" style="background-color:#f3f3f3; font-size: 2.3rem;">
            <table>
                <tr>
                    <th class="text text-default">
                        <span>
                            Servicio!!
                        </span>
                    </th>
                </tr>
            </table>
        </div>

    <form action="{{ route('servicio.store') }}" method="POST">
            {{ csrf_field() }}
    
            <div class="form-group col-md-6">
                <label> Producto </label>
                <input type="text" class="form-control" name="producto_id" placeholder="Producto">
            </div>
            <div class="form-group col-md-6">
                <label> articulo</label>
                <input type="text" class="form-control" name="articulo_id" placeholder="articulo">
            </div>
    
            <div class="form-group col-md-6">
                <label> pendiente </label>
                <input type="text" class="form-control" name="razon_pendiente_id" placeholder="pendiente">
            </div>
    
            <div class="form-group col-md-6">
                    <label>tipo de servicio</label>
                    <select class="form-control" name="tipo_servicio_id">
                        <option> Choose...</option>
                        <option value="1">Tecnico</option>
                        <option value="2">Developer</option>
                        <option value="3">Diseñador</option>
                    </select>
                </div>
    
                <div class="form-group col-md-6">
                        <label>modo de servicio</label>
                        <select class="form-control" name="modo_servicio_id">
                            <option> Choose...</option>
                            <option value="1">Domiciliario</option>
                            <option value="2">Garantia</option>
                        </select>
                    </div>

            <div class="form-group col-md-6">
                <label> identificacion de cliente </label>
                <input type="text" class="form-control" name="cliente_id" placeholder="identificacion de cliente">
            </div>
    
            <div class="form-group col-md-6">
                <label> identificacion de tecnico </label>
                <input type="text" class="form-control" name="customer_id" placeholder="identificacion de tecnico">
            </div>
    
            <div class="form-group col-md-6">
                <label> fecha inicio </label>
                <input type="date" class="form-control" name="fecha_inicio" placeholder="fecha inicio ">
            </div>
    
            <div class="form-group col-md-6">
                <label> fecha reparado </label>
                <input type="date" class="form-control" name="fecha_reparado" placeholder="fecha reparado">
            </div>
    
            <div class="form-group col-md-6">
                <label> fecha finalizado </label>
                <input type="date" class="form-control" name="fecha_finalizado"
                    placeholder="fecha finalizado">
            </div>
    
            <div class="form-group col-md-6">
                <label> valor mano de obra  </label>
                <input type="number" class="form-control" name="mano_obra" placeholder="valor mano de obra">
            </div>

            <div class="form-group col-md-6">
                    <label> valor asegurado </label>
                    <input type="text" class="form-control" name="valor_asegurado_producto" placeholder="valor asegurado">
                </div>

    <div class="form-group col-md-6">
            <label> happy call estado  </label>
            <input type="text" class="form-control" name="happy_call_estado" placeholder="happy call estado">
        </div>

<div class="form-group col-md-6">
        <label> happy call calificado </label>
        <input type="text" class="form-control" name="happy_call_calificacion" placeholder="happy call calificado">
    </div>

<div class="form-group col-md-6">
        <label> valor cotizado </label>
        <input type="number" class="form-control" name="valor_cotizado" placeholder="valor cotizado">
    </div>

<div class="form-group col-md-6">
        <label> valor total </label>
        <input type="number" class="form-control" name="valor_total" placeholder="valor total">
    </div>
    
    <div class="form-group col-md-6">
        <label> ubicacion del producto </label>
        <input type="text" class="form-control" name="ubicacion_producto" placeholder="ubicacion del producto ">
    </div>

<div class="form-group col-md-12">
        <label> reporte tecnico  </label>
        <textarea  name="reporte_tecnico"  type="text" class="form-control">

        </textarea>
    </div>

            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Registrar Servicio</button>
            </div>
    
        </form>


</div>
@endsection