@extends('layouts.app')

@section('content')
<div class="panel-heading">Eigene Altklausuren</div>

<div class="panel-body">
    @include('layouts.success')

    @forelse ($uploads as $upload)
        <div class="upload_list">
            <a href="/{{ $upload->filename }}" target="_blank">{{ $upload->title }}</a>
            <form method="POST" action="{{ $upload->id }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger" value="Löschen">
        </form>
        </div>
    @empty
        <p>Keine eigenen Altklausuren vorhanden.</p>
    @endforelse

    {{ $uploads->links() }}
</div>
@endsection
