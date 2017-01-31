@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inserat Einzelansicht</div>

                <div class="panel-body">
                        {{ $inserat->id }} - {{ $inserat->title }} - {{ $inserat->body }} - {{ $inserat->user->name }}<br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
