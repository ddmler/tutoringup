@extends('layouts.app')

@section('content')
<div class="panel-heading">{{ $inserat->title }}</div>

<div class="panel-body">
        {!! nl2br(e($inserat->body)) !!}

        <br><br>von: {{ $inserat->user->name }} ({{ Carbon\Carbon::parse($inserat->created_at)->format('d.m.Y H:i') }})<br>
        @if ($inserat->user_id == $user_id)
            <a href="{{ $inserat->id }}/edit" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Bearbeiten</a>
            <form class="delete-button" method="POST" action="{{ $inserat->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Löschen</button>
            </form>
        @endif
</div>
@endsection
