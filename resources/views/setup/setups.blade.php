@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-dark p-3">
        <div class="col-6 offset-3">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Title" name="title">
                </div>
                <div class="form-group ml-2">
                    <input type="text" class="form-control" placeholder="Search Body" name="body">
                </div>
                <div class="form-group ml-2">
                    <input type="submit" class="form-control btn btn-primary" value="Apply filters">
                </div>
            </form>
        </div>
    </div>

    @foreach($setups as $setup)
        <a href="/setup/{{$setup->id}}">
            <div class="container">
                <h4>{{$setup->title}}</h4>
                <p>{{$setup->description}}</p>
            </div>
        </a>
    @endforeach
@endsection()