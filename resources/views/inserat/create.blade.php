@extends('layouts.app')

@section('content')
<div class="panel-heading">Neues Inserat erstellen</div>

<div class="panel-body">

  @include('layouts.error')

  <div class="alert alert-info">
    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Mehrfachauswahl ist bei Kategorien möglich. Vergess nicht im Inhalt mit anzugeben, wie dich Interessierte kontaktieren sollen.
  </div>

    <form method="POST" action="/inserate">
      {{ csrf_field() }}
      <div class="form-group">
        <div class="radio">
          <label>
            <input type="radio" name="art" id="suche" value="0" @if (old('art') != 1) checked @endif>
            Suche Tutor
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="art" id="biete" value="1" @if (old('art') == 1) checked @endif>
            Biete Tutor
          </label>
        </div>

        Kategorien Studium: <br>
        <select multiple class="form-control" name="studiengaenge[]" size="5">
        @foreach ($studiengaenge as $studium)
            <option value="{{ $studium->id }}" @if (old('studiengaenge') !== null && in_array($studium->id, old('studiengaenge'))) selected="selected" @endif>{{ $studium->name }}</option>
        @endforeach
        </select>

        Kategorien Schule: <br>
        <select multiple class="form-control" name="schulfaecher[]" size="5">
        @foreach ($schulfaecher as $fach)
            <option value="{{ $fach->id }}" @if (old('schulfaecher') !== null && in_array($fach->id, old('schulfaecher'))) selected="selected" @endif>{{ $fach->name }}</option>
        @endforeach
        </select>

        <label for="title">Titel</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Ein aussagekräftiger Titel" value="{{ old('title') }}" required>
      </div>
      <div class="form-group">
        <label for="body">Inhalt</label>
        <textarea type="password" class="form-control" name="body" id="body" rows="10" placeholder="Beschreibe möglichst genau, was du benötigst oder anbietest." required>{{ old('body') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Inserat veröffentlichen</button>
    </form>
</div>
@endsection
