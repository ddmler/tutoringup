@if (session('status'))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {{ session('status') }}
    </div>
@endif