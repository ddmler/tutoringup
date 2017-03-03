@extends('layouts.app')

@section('content')
<div class="panel-heading">Neue Altklausur hochladen</div>

<div class="panel-body">

  @include('layouts.error')

    <form method="POST" action="/altklausuren" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        Kategorien Studium: <br>
        <select multiple class="form-control" name="studiengaenge[]" size="5">
        @foreach ($studiengaenge as $studium)
            <option value="{{ $studium->id }}" @if (old('studiengaenge') !== null && in_array($studium->id, old('studiengaenge'))) selected="selected" @endif>{{ $studium->name }}</option>
        @endforeach
        </select>

        <label for="title">Titel</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Ein aussagekräftiger Titel" value="{{ old('title') }}" required>
      </div>
      <div class="form-group">
        <label for="upload_file">Hochzuladende Datei</label>
        <input type="file" name="upload_file" id="upload_file"></input>
      </div>
      <button type="submit" class="btn btn-primary">Altklausur hochladen</button>
    </form>
</div>
@endsection
