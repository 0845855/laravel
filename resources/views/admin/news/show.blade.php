@extends('layouts.app')

@section('content')
<h1>Toon {{ $news->title }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $news->title }}</h2>
    <p>
        <strong>Inleiding:</strong> {{ $news->introduction }}<br>
        <strong>Nieuwsbericht:</strong> {{ $news->news_item }}
    </p>
</div>
@endsection