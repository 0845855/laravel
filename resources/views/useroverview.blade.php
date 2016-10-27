@extends('layouts.app')

@section('title')
    Nieuwsberichten overzicht
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading">@include('includes.message-block')</div>
            <div class="col-md-8 col-md-offset-2">
                @foreach ($users as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $item->id }} | {{ $item->name }} | {{ $item->email }}
                            <form method="post" action="{{ url('makeadmin') }}/{{$item->id}}">
                                {{ csrf_field() }}
                                <input type="hidden" disabled value="{{$item->id}}" name="id">
                                <input type="hidden" disabled value="{{$item->admin}}" name="admin">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if ($item->admin == 1)
                                <button type="submit" name="name" value="0">Maak user</button>
                            @else
                                <button type="submit" name="name" value="1">Maak admin</button>
                            @endif
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection