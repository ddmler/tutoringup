@extends('layouts.app')

@section('content')
<div class="panel-heading">Altklausuren Übersicht</div>

<div class="panel-body">
    @include('layouts.success')

    @if ($subject)
        Aktueller Filter:
        <a href="/altklausuren/">{{ $studium[$subject-1]->name }} <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
    @endif

    <div class="filter_list">
	    Zeige nur: <br>
	    @foreach ($studiengaenge as $studium)
	        <a href="/altklausuren/{{ $studium->id }}" class="btn btn-default">{{ $studium->name }}</a>
	    @endforeach
    </div><br>

    <table class="table table-hover">
    <tr>
        <th>Altklausur</th>
        <th>Format</th>
        <th>Kategorien</th>
        <th>Datum</th>
    </tr>
    @forelse ($uploads as $upload)
    <tr>
        <td>
            <a href="/{{ $upload->filename }}" target="_blank">{{ $upload->title }}</a>
        </td>
        <td>
            {{ strtoupper(substr($upload->filename, -3, 3)) }}
        </td>
        <td>
            @foreach ($upload->studiengaenge as $studium)
                <a href="/altklausuren/{{ $studium->id }}" class="label label-primary">{{ $studium->name }}</a>
            @endforeach
        </td>
        <td>
            {{ Carbon\Carbon::parse($upload->created_at)->format('d.m.Y H:i') }}
        </td>
    </tr>
    @empty
        <tr><td colspan="4">Keine Altklausuren vorhanden.</td></tr>
    @endforelse
    </table>

    {{ $uploads->links() }}
</div>
@endsection
