@extends('layouts.app')

@section('title')
    Maak nieuw nieuwsbericht
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Maak nieuw nieuwsbericht</div>

                        <div class="panel-body">
                            @include('includes.message-block')
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('createnews') }}">

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Titel</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" placeholder="Titel nieuwsbericht" required autofocus>

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                                    <label for="introduction" class="col-md-4 control-label">Inleiding</label>

                                    <div class="col-md-6">
                                        <textarea name="introduction" class="form-control" rows="8" cols="50" placeholder="Inleiding"></textarea>

                                        @if ($errors->has('introduction'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('introduction') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('news_item') ? ' has-error' : '' }}">
                                    <label for="news_item" class="col-md-4 control-label">Nieuwsbericht</label>

                                    <div class="col-md-6">
                                        <textarea name="news_item" class="form-control" rows="8" cols="50" placeholder="Nieuwsbericht"></textarea>

                                        @if ($errors->has('news_item'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('news_item') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label for="category" class="col-md-4 control-label">Categorie</label>

                                    <div class="col-md-6">
                                        <select name="category" class="form-control">
                                            <option value="nieuws">Nieuws</option>
                                            <option value="review">Review</option>
                                            <option value="preview">Preview</option>
                                        </select>

                                        @if ($errors->has('category'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" name="name" class="btn btn-primary">
                                            Verstuur bericht
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection