
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
                                tipo!!
                            </span>
                        </th>
                    </tr>
                </table>
            </div>
    
            <form action="{{ route('tipo.store') }}" method="POST">
                {{ csrf_field() }}
        
                <div class="form-group col-md-6">
                    <label> nombre </label>
                    <input type="text" class="form-control" name="nombre" placeholder="nombre de tipo">
                </div>
    
    
                <div class="form-group col-md-12">
                    <label> descripcion  </label>
                <textarea  name="descripcion"  type="text" class="form-control">
    
                </textarea>
                </div>
    
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">Registrar tipo</button>
                </div>
        
            </form>
@endsection