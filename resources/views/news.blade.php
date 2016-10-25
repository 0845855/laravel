@extends('layouts.app')

@section('title')
    De 24/7 Gamenieuws website!
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $news->title }}</div>

                        <div class="panel-body">
                            <p>{{ $news->introduction }}</p>

                            <p>{{ $news->news_item }}</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection