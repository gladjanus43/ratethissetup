@extends('layouts.app')

@section('content')
    <h1>Enter new setup</h1>

    <div class="container">
        <form class="form-control" action="/create" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="title" name="title" placeholder="Title" class="form-check m-2">
                <input type="description" name="description" placeholder="Description" class="form-check m-2">

                <button type="submit" class="btn btn-primary form-check m-2">Enter Your Setup!</button>
            </div>
        </form>
    </div>
@endsection