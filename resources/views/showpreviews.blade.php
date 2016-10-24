@extends('layouts.app')

@section('title')
    Previews
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($news as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $item->title }}</div>

                        <div class="panel-body">
                            <p>{{ $item->introduction }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection