@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

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
                    
                    You not are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
