@extends('layouts.app')

@section('title')
    Zoeken
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Zoeken</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('search.search') }}">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Zoekopdracht</label>

                                <div class="col-md-6">
                                    <input id="searchtext" name="searchtext" type="text" class="form-control" required placeholder="Zoekwoord..." autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label">Categorie</label>

                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="category[]" value="nieuws">Nieuws</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="category[]" value="review">Reviews</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="category[]" value="preview">Previews</label>
                                    </div>

                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" name="name" class="btn btn-primary">
                                        Zoeken
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @foreach ($search as $item)
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a></div>

                        <div class="panel-body">
                            <p>{{ $item->introduction }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection