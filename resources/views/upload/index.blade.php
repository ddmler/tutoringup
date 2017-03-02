@extends('layouts.app')

@section('content')
<div class="panel-heading">Altklausuren Übersicht</div>

<div class="panel-body">
    @include('layouts.success')
 
    @if ($subject)
        Aktueller Filter:
        {{ $studium[$subject-1]->name }}
    @endif

    <div class="filter_list">
	    Zeige nur: <br>
	    @foreach ($studiengaenge as $studium)
	        <a href="/altklausuren/{{ $studium->id }}" class="btn btn-default">{{ $studium->name }}</a>
	    @endforeach
    </div><br>

    @forelse ($uploads as $upload)
        <div class="upload_list">
            <a href="/{{ $upload->filename }}" target="_blank">{{ $upload->title }}</a>
        </div>
    @empty
        <p>Keine Altklausuren vorhanden.</p>
    @endforelse

    {{ $uploads->links() }}
</div>
@endsection
