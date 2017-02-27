@extends('layouts.app')

@section('content')
<div class="panel-heading">Eigene Inserate</div>

<div class="panel-body">
    @include('layouts.success')

    @foreach ($inserate as $inserat)
        <div class="inserate_list">
        @if ($inserat->art == 0)
            Suche Tutor: 
        @elseif ($inserat->art == 1)
            Biete Tutor:
        @endif
        <a href="/inserate/{{ $inserat->id }}">{{ $inserat->title }}</a> (Erstellt: {{ $inserat->created_at }})
        <hr>
        {!! str_limit(nl2br(e($inserat->body)), 300) !!}
        <br>
        von: {{ $inserat->user->name }}<br>Kategorien: 
        @foreach ($inserat->studiengaenge as $studium)
            {{ $studium->name }}
        @endforeach
        @foreach ($inserat->schulfaecher as $fach)
            {{ $fach->name }}
        @endforeach
        <br>
        <a href="{{ $inserat->id }}/edit" class="btn btn-default">Bearbeiten</a>
        <form method="POST" action="{{ $inserat->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" value="Löschen">
        </form>
        </div>
    @endforeach
    {{ $inserate->links() }}
</div>
@endsection
