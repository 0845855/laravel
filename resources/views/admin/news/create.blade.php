@extends('layouts.app')

@section('content')
<h1>Maak een nieuwsbericht</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'news')) }}

<div class="form-group">
    {{ Form::label('title', 'Titel') }}
    {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('introduction', 'Inleiding') }}
    {{ Form::email('introduction', Input::old('introduction'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('news_item', 'Bericht') }}
    {{ Form::select('news_item', Input::old('news_item'), array('class' => 'form-control')) }}
</div>

{{ Form::submit('Plaats het bericht!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection