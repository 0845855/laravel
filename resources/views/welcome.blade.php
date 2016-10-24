@extends('layouts.app')

@section('title')
    De 24/7 Gamenieuws website!
@endsection

@section('content')
    <div class="row">

        <div class="col-sm-8 blog-main">

            @foreach ($news as $item)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="news/{{ $item->id }}">{{ $item->title }}</a></h2>

                    <p>{{ $item->introduction }} <a href="news/{{ $item->id }}">Lees meer...</a></p>

                </div><!-- /.blog-post -->
                <hr>
            @endforeach

        </div><!-- /.blog-main -->

    </div><!-- /.row -->
@endsection