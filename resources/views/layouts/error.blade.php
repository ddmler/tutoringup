@if (count($errors) > 0)
  <div class="alert alert-danger">
  	  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Fehler: 
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif