@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Nieuwsberichten</h1>
        {{ Session::get('message') }}

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>Titel</td>
                <td>Wijzig</td>
                <td>Verwijder</td>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $value)
                <tr>
                    <td>{{ $value->title }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td><a href="news/{{ $data->id }}/edit">Wijzig</a></td>
                    <form class="" action="news/{{ $data->id }}" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" name="name" value="Verwijderen">
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
