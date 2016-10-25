@extends('layouts.app')

@section('title')
    Nieuwsberichten overzicht
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="addnews">Maak nieuw nieuwsbericht</a></div>
                </div>
                @foreach ($news as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $item->title }} <a href="editnews/{{ $item->id }}">Wijzig</a> <a href="deletenews/{{ $item->id }}">Verwijderen</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection