@extends('layouts.app')

@section('content')
<div class="panel-heading">Eigene Altklausuren</div>

<div class="panel-body">
    @include('layouts.success')

    <table class="table table-hover">
    <tr>
        <th>Altklausur</th>
        <th>Format</th>
        <th>Kategorien</th>
        <th>Datum</th>
        <th>Löschen</th>
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
                <span class="label label-primary">{{ $studium->name }}</span>
            @endforeach
        </td>
        <td>
            {{ Carbon\Carbon::parse($upload->created_at)->format('d.m.Y H:i') }}
        </td>
        <td>
            <form method="POST" action="{{ $upload->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Löschen</button>
            </form>
        </td>
    </tr>
    @empty
        <tr><td colspan="4">Keine eigenen Altklausuren vorhanden.</td></tr>
    @endforelse
    </table>

    {{ $uploads->links() }}
</div>
@endsection
