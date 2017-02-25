@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inserat Übersicht</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <div class="filter_list">
                    Filter going here ...
                    </div>

                    @foreach ($inserate as $inserat)
                        <div class="inserate_list">
                        @if ($inserat->art == 0)
                            Suche Tutor: 
                        @elseif ($inserat->art == 1)
                            Biete Tutor:
                        @endif
                        <a href="/inserate/{{ $inserat->id }}">{{ $inserat->title }}</a> (Erstellt: {{ $inserat->created_at }})
                        <hr>
                        {{ str_limit($inserat->body, 400) }}
                        <br>
                        von: {{ $inserat->user->name }}<br>Kategorien: 
                        @foreach ($inserat->studiengaenge as $studium)
                            {{ $studium->name }}
                        @endforeach
                        @foreach ($inserat->schulfaecher as $fach)
                            {{ $fach->name }}
                        @endforeach
                        </div>
                    @endforeach

                    {{ $inserate->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
