@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Gebruikersprofiel</div>

                <div class="panel-body">
                        <p>Hallo {{ Auth::user()->name }},<br/>
                            Welkom op je profielpagina. Hier is het mogelijk om je gegevens aan te passen.</p>

                        <p><a href="password_edit">Wachtwoord aanpassen (Work in progress)</a><br/>
                            <a href="user_edit">Gegevens aanpassen</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
