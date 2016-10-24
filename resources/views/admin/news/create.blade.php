@extends('layouts.app')

@section('content')
<h1>Maak een nieuwsbericht</h1>

<form class="" action="/news" method="post">

    <input type="text" name="title" value="" placeholder="Titel">
    {{ ($errors->has('title')) ? $errors->first('title') : '' }}<br/>

    <textarea name="introduction" rows="8" cols="40" placeholder="Inleiding"></textarea>
    {{ ($errors->has('introduction')) ? $errors->first('introduction') : '' }}<br/>

    <textarea name="news_item" rows="8" cols="40" placeholder="Nieuwsbericht"></textarea>
    {{ ($errors->has('news_item')) ? $errors->first('news_item') : '' }}<br/>

    <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="name" value="Plaats bericht">
</form>

@endsection