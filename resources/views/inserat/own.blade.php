@extends('layouts.app')

@section('content')
<div class="panel-heading">Eigene Inserate</div>

<div class="panel-body">
    @include('layouts.success')

    <div class="alert alert-info">
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Eigene Inserate werden automatisch nach 1 Monat gelöscht.
    </div>

    @forelse ($inserate as $inserat)
        <div class="inserate-list">
        @if ($inserat->art == 0)
            Suche Tutor:
        @elseif ($inserat->art == 1)
            Biete Tutor:
        @endif
        <a href="/inserate/{{ $inserat->id }}">{{ $inserat->title }}</a> (Erstellt: {{ Carbon\Carbon::parse($inserat->created_at)->format('d.m.Y H:i') }})
        <hr>
        {!! str_limit(nl2br(e($inserat->body)), 300) !!}
        <hr>
        von: {{ $inserat->user->name }}<br>Kategorien:
        @foreach ($inserat->studiengaenge as $studium)
            <span class="label label-primary">{{ $studium->name }}</span>
        @endforeach
        @foreach ($inserat->schulfaecher as $fach)
            <span class="label label-primary">{{ $fach->name }}</span>
        @endforeach
        <br><div class="inserate-own-buttons">
        <a href="{{ $inserat->id }}/edit" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Bearbeiten</a>
            <form class="delete-button" method="POST" action="{{ $inserat->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Löschen</button>
            </form>
        </div>
        </div>
    @empty
        <p>Keine eigenen Inserate vorhanden.</p>
    @endforelse
    {{ $inserate->links() }}
</div>
@endsection
