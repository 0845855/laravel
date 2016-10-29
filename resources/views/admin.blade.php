@extends('layouts.app')

@section('title')
    Adminpaneel
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Adminpaneel</div>

                        <div class="panel-body">@include('includes.message-block')</div>

                        <div class="panel-body">
                            <p><a href="addnews">Nieuw nieuwsbericht maken</a><br/>
                                <a href="newsoverview">Nieuwsberichten overzicht</a><br/>

                                <a href="useroverview">Gebruikersoverzicht</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection