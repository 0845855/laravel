@extends('layouts.app')

@section('content')
<h1>Edit {{ $news->title }}</h1>

<form class="" action="/blog/{{ $detailpage->id }}" method="post">
    <input type="text" name="title" value="{{ $detailpage->title }}" placeholder="Titel">
    {{ ($errors->has('title')) ? $errors->first('title') : '' }}<br/>
    <textarea name="introduction" rows="8" cols="40" placeholder="Inleiding">{{ $detailpage->introduction }}</textarea>
    {{ ($errors->has('introduction')) ? $errors->first('introduction') : '' }}<br/>
    <textarea name="news_item" rows="8" cols="40" placeholder="Nieuwsbericht">{{ $detailpage->news_item }}</textarea>
    {{ ($errors->has('news_item')) ? $errors->first('news_item') : '' }}<br/>

    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="name" value="Wijzig bericht">
</form>
@endsection