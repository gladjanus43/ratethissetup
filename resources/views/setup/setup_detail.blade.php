@extends('layouts.app')

@section('content')

    <div class="container col-6 offset-3 mt-5">
        <h4>{{$setup->title}}</h4>
        <img src="{{ asset('storage/pictures/'. $setup->id .'.png') }}" width="100%" height="auto"/>
        <p>{{$setup->description}}</p>
    </div>




    <div class="container col-6 offset-3 mt-5">
        @if(Auth::check())
            <div class="container col-6 offset-3">
                <form method="post" action="/comment/" class="form p-3">
                    {{csrf_field()}}
                    <input class="form-control mt-2" type="text" placeholder="Title" name="title">
                    <input class="form-control mt-2" type="text" placeholder="Comment" name="body">
                    <input type="hidden" value="{{$setup->id}}" name="setup_id">
                    <input class="btn btn-primary form-control mt-2" type="submit" value="Post Comment">
                </form>
            </div>
        @else
            <p>Please log in or register to post comments</p>
        @endif

        <h3>Comments</h3>
        @foreach($comments as $comment)
            <div class="row mt-4 bg-white p-4">
                <div class="col-3 d-flex align-items-center flex-column bg-light">
                    <img src="{{asset('storage/avatars/avatar.png')}}" width="50px" height="auto" class="mt-3">
                    <p class="mt-2">
                        Naam comment meneer
                    </p>
                    <p class="text-center">
                        <small>
                            persoonlijk tekstje
                        </small>
                    </p>
                </div>
                <div class="col-7">
                    <h5>{{$comment->title}}</h5>
                    <p>
                        {{$comment->body}}
                    </p>
                </div>
                <div class="col-2 d-flex flex-column justify-content-between">
                    <div class="text-center btn btn-primary"><a href="" style="color: #FFFFFF;">Up</a></div>
                    <div class="text-center btn btn-primary"><a href="" style="color: #FFFFFF;">Down</a></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
