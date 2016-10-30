@extends('layouts.app')

@section('title')
    Wijzig wachtwoord
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Wachtwoord aanpassen</div>

                    <div class="panel-body">
                        @include('includes.message-block')
                        <form action="{{ url('updatePassword') }}" method="post">
                                <div class="form-group">
                                    <label for="email">Huidig wachtwoord</label>
                                    <input class="form-control" type="password" name="password_current" id="password_current">
                                </div>
                                <div class="form-group">
                                    <label for="password">Wachtwoord</label>
                                    <input class="form-control" type="password" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Wachtwoord bevestigen</label>
                                    <input class="form-control" type="password" name="password_confirm" id="password_confirm">
                                </div>
                            <button type="submit" class="btn btn-primary">Wijzig wachtwoord</button>
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection