@extends('layouts.app')

@section('content')
<div class="panel-heading">Inserat Übersicht</div>

<div class="panel-body">
    @include('layouts.success')

    @if ($art)
        Aktueller Filter:
        <a href="/inserate/">{{ ($art == "suche") ? "Suche Tutor" : "Biete Tutor" }} <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        @if ($role)
            - <a href="/inserate/filter/{{ $art }}">{{ ($role == "student") ? "Student" : "Schüler" }} <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        @endif
        @if ($subject)
            - <a href="/inserate/filter/{{ $art }}/{{ $role }}">{{ ($role == "student") ? $studium[$subject-1]->name : $schule[$subject-1]->name }} <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        @endif
    @endif


    <div class="filter_list">
    Zeige nur: <br>
    @if (!$art)
        <a href="/inserate/filter/suche/" class="btn btn-default">Suche Tutor</a>
        <a href="/inserate/filter/biete/" class="btn btn-default">Biete Tutor</a>
    @elseif ($art and !$role)
        <a href="/inserate/filter/{{ $art }}/student/" class="btn btn-default">Student</a>
        <a href="/inserate/filter/{{ $art }}/schueler/" class="btn btn-default">Schüler</a>
    @elseif ($role == "student")
        @foreach ($studiengaenge as $studium)
            <a href="/inserate/filter/{{ $art }}/student/{{ $studium->id }}" class="btn btn-default">{{ $studium->name }}</a>
        @endforeach
    @elseif ($role == "schueler")
        @foreach ($schulfaecher as $fach)
            <a href="/inserate/filter/{{ $art }}/schueler/{{ $fach->id }}" class="btn btn-default">{{ $fach->name }}</a>
        @endforeach
    @endif
    </div><br>


    @forelse ($inserate as $inserat)
        <div class="inserate-list">
        @if ($inserat->art == 0)
            Suche Tutor:
        @elseif ($inserat->art == 1)
            Biete Tutor:
        @endif
        <a href="/inserate/{{ $inserat->id }}">{{ $inserat->title }}</a>
        <hr>
        {!! str_limit(nl2br(e($inserat->body)), 300) !!}
        <hr>
        von: {{ $inserat->user->name }} (Erstellt: {{ Carbon\Carbon::parse($inserat->created_at)->format('d.m.Y H:i') }})<br>Kategorien:
        @foreach ($inserat->studiengaenge as $studium)
            <span class="label label-primary">{{ $studium->name }}</span>
        @endforeach
        @foreach ($inserat->schulfaecher as $fach)
            <span class="label label-primary">{{ $fach->name }}</span>
        @endforeach
        </div>
    @empty
        <p>Keine Inserate vorhanden.</p>
    @endforelse

    {{ $inserate->links() }}
</div>
@endsection
