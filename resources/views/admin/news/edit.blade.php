@extends('layouts.app')

@section('content')
<h1>Edit {{ $news->title }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($news, array('route' => array('news.update', $news->id), 'method' => 'PUT')) }}

<div class="form-group">
    {{ Form::label('title', 'Titel') }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('introduction', 'Inleiding') }}
    {{ Form::email('introduction', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('news_item', 'Bericht') }}
    {{ Form::select('news_item', null, array('class' => 'form-control')) }}
</div>

{{ Form::submit('Wijzig bericht!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection