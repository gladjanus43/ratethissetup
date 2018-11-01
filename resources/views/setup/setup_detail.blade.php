@extends('layouts.app')

@section('content')
    <div class="container col-6 offset-3 mt-5">
        <h4>{{$setup->title}}</h4>
        <img src="{{ asset('storage/pictures/'. $setup->id .'.png') }}" width="100%" height="auto"/>
        <p>{{$setup->description}}</p>
    </div>


    <div class="container col-6 offset-3">
        <form method="post" action="" class="form p-3">
            <input class="form-control mt-2" type="text" placeholder="Comment">
            <input class="form-control mt-2" type="text" placeholder="Tip">
            <input class="btn btn-primary form-control mt-2" type="submit" value="Post Comment">
        </form>
    </div>

    <div class="container col-6 offset-3 mt-5">
        <h3>Comments</h3>
        <div class="row mt-4">
            <div class="col-3 justify-content-center">
                <img src="{{asset('storage/avatars/avatar.png')}}" width="50px" height="auto" class="">
                <p class="mt-2">
                    Sjaak Slingerkaak
                </p>
            </div>
            <div class="col-9">
                Comment
            </div>
        </div>
    </div>
@endsection
