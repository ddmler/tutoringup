@extends('layouts.app')

@section('content')
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
@endsection
