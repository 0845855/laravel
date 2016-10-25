@extends('layouts.app')

@section('title')
    Nieuwsberichten overzicht
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($users as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $item->id }} | {{ $item->name }} | {{ $item->email }}
                        <form>
                        @if (Auth::user()->admin == 1)
                            <button type="submit" name="name">Maak user</button>
                        @else
                            <button type="submit" name="name">Maak admin</button>
                        @endif
                        </form></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection