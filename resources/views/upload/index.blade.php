@extends('layouts.app')

@section('content')
<div class="panel-heading">Altklausuren Übersicht</div>

<div class="panel-body">
    @include('layouts.success')

    @foreach ($uploads as $upload)
        <div class="upload_list">
            <a href="/altklausur/{{ $upload->filename }}" target="_blank">{{ $upload->title }}</a>
        </div>
    @endforeach

    {{ $uploads->links() }}
</div>
@endsection
