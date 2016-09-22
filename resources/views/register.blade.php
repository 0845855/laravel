@extends('layouts.master')

@section('title')
    Nieuw account maken
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <h3>Een account aanmaken</h3>
        <form action="#" method="post">
            <div class="form-group">
                <label for="first-name">Voornaam</label>
                <input class="form-control" type="text" name="first_name" id="first_name">
            </div>
            <div class="form-group">
                <label for="first-name">Achternaam</label>
                <input class="form-control" type="text" name="last_name" id="last_name">
            </div>
            <div class="form-group">
                <label for="email">E-mailadres</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord bevestigen</label>
                <input class="form-control" type="password" name="password_confirm" id="password_confirm">
            </div>
            <button type="submit" class="btn btn-primary">Registreren</button>
        </form>
    </div>
</div>
@endsection