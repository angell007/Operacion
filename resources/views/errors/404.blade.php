@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Error</h1>
    
                    <a href="{{route ('home') }}">Ir a Inicio </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection