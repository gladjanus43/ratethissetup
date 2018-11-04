@extends('layouts.app')

@section('content')
    <div class="container col-6 offset-3">
        <h1>Enter new setup</h1>
        <form class="bg-white p-3" action="/create" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input type="title" name="title" placeholder="Title" class="form-control">
            </div>

            <div class="form-group">
                <input type="description" name="description" placeholder="Description" class="form-control">
            </div>

            <div class="form-group">
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                    <option>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="file" name="setup_picture" class="form-control-file">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Enter Your Setup!</button>
            </div>
        </form>
    </div>
@endsection