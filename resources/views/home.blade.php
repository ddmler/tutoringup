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
                
                    <a href="inserate/" class="btn btn-primary btn-lg">Inserate</a>
                    <a href="altklausuren/" class="btn btn-default btn-lg">Altklausuren</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
