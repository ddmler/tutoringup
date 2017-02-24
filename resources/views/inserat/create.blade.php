@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inserat Liste</div>

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
                
                    <form method="POST" action="/inserate">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Titel</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Ein aussagekräftiger Titel" required>
                      </div>
                      <div class="form-group">
                        <label for="body">Inhalt</label>
                        <textarea type="password" class="form-control" name="body" id="body" rows="10" placeholder="Beschreibe möglichst genau, was du benötigst." required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Inserat veröffentlichen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
