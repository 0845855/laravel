@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign In</h3>
            {{ Form::open(array('url' => 'login')) }}
                <div class="form-group">
                    {{ $errors->first('email') }}

                    {{ Form::label('E-mailadres', 'email') }}
                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'email@provider.nl')) }}
                </div>
                <div class="form-group">
                    {{ $errors->first('password') }}
                    {{ Form::label('Wachtwoord', 'password') }}
                    {{ Form::password('password') }}
                </div>
            {{ Form::submit('Submit!') }}
            {{ Form::close() }}
        </div>
    </div>
@endsection