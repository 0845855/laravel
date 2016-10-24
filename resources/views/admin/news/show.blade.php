@extends('layouts.app')

@section('content')
<h1>Toon {{ $detailpage->title }}</h1>

<div class="jumbotron text-center">
    <h2>{{ $detailpage->title }}</h2>
    <p>
        <strong>Inleiding:</strong> {{ $detailpage->introduction }}<br>
        <strong>Nieuwsbericht:</strong> {{ $detailpage->news_item }}
    </p>
</div>

  <a href="/news">Back to home</a>
@endsection