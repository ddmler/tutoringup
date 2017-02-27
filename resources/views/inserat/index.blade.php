@extends('layouts.app')

@section('content')
<div class="panel-heading">Inserat Übersicht</div>

<div class="panel-body">
    @include('layouts.success')

    <div class="filter_list">
    Zeige nur: <br>
    @if (!$art)
        <a href="/inserate/filter/suche/">Suche Tutor</a>
        <a href="/inserate/filter/biete/">Biete Tutor</a>
    @elseif ($art and !$role)
        <a href="student/">Student</a>
        <a href="schueler/">Schüler</a>
    @elseif ($role == "student")
        @foreach ($studiengaenge as $studium)
            <a href="{{ $studium->id }}">{{ $studium->name }}</a>
        @endforeach
    @elseif ($role == "schueler")
        @foreach ($schulfaecher as $fach)
            <a href="{{ $fach->id }}">{{ $fach->name }}</a>
        @endforeach
    @endif
    </div>

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
        </div>
    @endforeach

    {{ $inserate->links() }}
</div>
@endsection
