@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Nieuwsberichten</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Titel</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->title }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the nerd (uses the destroy method DESTROY /news/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                    {{ Form::open(array('url' => 'news/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Verwijder dit bericht', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}

                    <!-- show the nerd (uses the show method found at GET /news/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('news/' . $value->id) }}">Toon</a>

                        <!-- edit this nerd (uses the edit method found at GET /news/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('news/' . $value->id . '/edit') }}">Wijzig</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
