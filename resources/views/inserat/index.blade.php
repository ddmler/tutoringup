@extends('layouts.app')

@section('content')
<div class="panel-heading">Inserat Übersicht</div>

<div class="panel-body">
    @include('layouts.success')

    @if ($art)
        Aktueller Filter:
        <a href="/inserate/">{{ ($art == "suche") ? "Suche Tutor" : "Biete Tutor" }}</a>
        @if ($role)
            - <a href="/inserate/filter/{{ $art }}">{{ ($role == "student") ? "Student" : "Schüler" }}</a>
        @endif
        @if ($subject)
            - {{ ($role == "student") ? $studium[$subject-1]->name : $schule[$subject-1]->name }}
        @endif
    @endif


    <div class="filter_list">
    Zeige nur: <br>
    @if (!$art)
        <a href="/inserate/filter/suche/">Suche Tutor</a>
        <a href="/inserate/filter/biete/">Biete Tutor</a>
    @elseif ($art and !$role)
        <a href="/inserate/filter/{{ $art }}/student/">Student</a>
        <a href="/inserate/filter/{{ $art }}/schueler/">Schüler</a>
    @elseif ($role == "student")
        @foreach ($studiengaenge as $studium)
            <a href="/inserate/filter/{{ $art }}/student/{{ $studium->id }}">{{ $studium->name }}</a>
        @endforeach
    @elseif ($role == "schueler")
        @foreach ($schulfaecher as $fach)
            <a href="/inserate/filter/{{ $art }}/schueler/{{ $fach->id }}">{{ $fach->name }}</a>
        @endforeach
    @endif
    </div><br>


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
