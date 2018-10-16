@extends('layouts.app')

@section('content')
    <h1>Register</h1>

    <div class="col-md-4 offset-4">
        <form class="form-control" action="/register" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" class="form-check m-2">
                <input type="text" name="email" placeholder="E-mail" class="form-check m-2">
                <input type="password" name="password" placeholder="Password" class="form-check m-2">
                <button type="submit" class="btn btn-primary form-check m-2">Register</button>
            </div>
        </form>
    </div>
@endsection