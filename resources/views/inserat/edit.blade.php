@extends('layouts.app')

@section('content')
<div class="panel-heading">Inserat bearbeiten</div>

<div class="panel-body">

  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

    <form method="POST" action="/inserate/{{ $inserat->id }}">
      {{ csrf_field() }}
      <div class="form-group">
        <div class="radio">
          <label>
            <input type="radio" name="art" id="suche" value="0" @if ($inserat->art == 0) checked @endif >
            Suche Tutor
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="art" id="biete" value="1" @if ($inserat->art == 1) checked @endif >
            Biete Tutor
          </label>
        </div>

        Kategorien Studium: <br>
        <select multiple class="form-control" name="studiengaenge[]" size="5">
        @foreach ($studiengaenge as $studium)
            <option value="{{ $studium->id }}">{{ $studium->name }}</option>
        @endforeach
        </select>

        Kategorien Schule: <br>
        <select multiple class="form-control" name="schulfaecher[]" size="5">
        @foreach ($schulfaecher as $fach)
            <option value="{{ $fach->id }}">{{ $fach->name }}</option>
        @endforeach
        </select>

        <label for="title">Titel</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Ein aussagekräftiger Titel" value="{{ $inserat->title }}" required>
      </div>
      <div class="form-group">
        <label for="body">Inhalt</label>
        <textarea type="password" class="form-control" name="body" id="body" rows="10" placeholder="Beschreibe möglichst genau, was du benötigst." required>{{ $inserat->body }}</textarea>
      </div>

      {{ method_field('PATCH') }}
      <button type="submit" class="btn btn-primary">Inserat bearbeiten</button>
    </form>
</div>
@endsection
