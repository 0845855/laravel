@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if (Auth::user()->admin == 1)
                    <div class="panel panel-default">
                        <div class="panel-heading">Adminpaneel</div>

                        <div class="panel-body">
                            <p><a href="/news/index">Nieuwsoverzicht</a><br/>
                                <a href="/users">Gebruikersoverzicht</a></p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection