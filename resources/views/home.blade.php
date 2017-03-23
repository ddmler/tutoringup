@extends('layouts.app')

@section('content')
</div></div></div></div>

<div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

<div class="homepage">

    <br>
    <img src="homepage.jpg" class="img-responsive img-rounded">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <hr>

    Deine Seite für Nachhilfe allerart - Suchst du Nachhilfe für dein Studium oder die Schule? Dann bist du bei Tutoring.UP genau richtig.
    Im Gegensatz zu anderen Nachhilfe-Websites findest du hier nicht nur Tutoren, die Schüler unterstützen, sondern auch jene, die dir im Studium helfen.
    Dabei kannst du dir die jeweilige Fakultät deines Studienganges auswählen, um einen passenden Tutor zu finden oder eine Nachhilfe-Anfrage zu starten.

    <hr>

    Überzeuge dich zuerst selbst von unserem Angebot. Ganz ohne Anmeldung kannst du alle Nachhilfe-Anfragen und Angebote von Tutoren sowie Altklausuren durchstöbern:

    <div class="home-flex">
        <a href="inserate/" class="btn btn-primary btn-lg">Inserate</a>
        <a href="altklausuren/" class="btn btn-primary btn-lg">Altklausuren</a>
    </div>

    <hr>

    Image (edited) &copy; <a href="https://www.flickr.com/photos/francisco_osorio/9513731734">Francisco Osorio</a>

</div>
</div>
</div>
</div>

<div><div><div><div>
@endsection
