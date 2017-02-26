@extends('layouts.app')

@section('content')
<div class="panel-heading">{{ $inserat->title }}</div>

<div class="panel-body">
        {!! nl2br(e($inserat->body)) !!}

        <br><br>von: {{ $inserat->user->name }} ({{ $inserat->created_at }})<br>
        @if ($inserat->user_id == $user_id)
            <a href="{{ $inserat->id }}/edit" class="btn btn-default">Bearbeiten</a>
            <form method="POST" action="{{ $inserat->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" class="btn btn-danger" value="Löschen">
            </form>
        @endif
</div>
@endsection
