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

                <div class="panel panel-default">
                    <div class="panel-heading">@include('includes.message-block')</div>
                </div>
                @foreach ($news as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $item->title }} <a href="editnews/{{ $item->id }}"><button type="button" class="btn btn-warning">Wijzigen</button></a> <a href="deletenews/{{ $item->id }}"><button type="button" class="btn btn-danger">Verwijderen</button></a>

                            <form method="post" action="{{ url('makeactive') }}">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$item->id}}" name="id">
                                <input type="hidden" value="{{$item->active}}" name="active">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                @if ($item->active == 1)
                                    <button type="submit" name="name" class="btn btn-default" value="0">Maak inactief</button>
                                @else
                                    <button type="submit" name="name" class="btn btn-default" value="1">Maak actief</button>
                                @endif
                            </form>

                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection