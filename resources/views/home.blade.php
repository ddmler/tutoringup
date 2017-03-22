@extends('layouts.app')

@section('content')
<div class="panel-heading">TutoringUP</div>

<div class="panel-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="home-flex">
        <a href="inserate/" class="btn btn-primary btn-lg">Inserate</a>
        <a href="altklausuren/" class="btn btn-primary btn-lg">Altklausuren</a>
    </div>
</div>
@endsection
