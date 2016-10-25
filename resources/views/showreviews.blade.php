@extends('layouts.app')

@section('title')
    Reviews
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($news as $item)
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ route('news.show', $item->id) }}"><b>Review:</b> {{ $item->title }}</a></div>

                    <div class="panel-body">
                        <p>{{ $item->introduction }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection