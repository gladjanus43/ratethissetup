@extends('layouts.app')

@section('content')
    <div class="container col-6 offset-3 mt-5">
        <div class="row d-flex justify-content-between">
            <h4>{{$setup->title}}</h4>
            @if(Auth::check())
                @if(Auth::user()->id == $setup->user_id)
                    <a href="">Edit</a>
                @endif
            @endif
        </div>

        <img src="{{ asset('storage/pictures/'. $setup->id .'.png') }}" width="100%" height="auto"/>
        <p>{{$setup->description}}</p>
    </div>




    <div class="container col-6 offset-3 mt-5">
        @if(Auth::check())
            <div class="container">
                <form method="post" action="/comment">
                    {{csrf_field()}}
                    <input type="hidden" name="setup_id" value="{{$setup->id}}">
                    <div class="form-group">
                        <input class="mt-2 form-control" type="text" placeholder="Title" name="title">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Comment" name="body">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary form-control" type="submit" value="Post Comment">
                    </div>
                </form>
            </div>
        @else
            <p>Please log in or register to post comments</p>
        @endif

        @if($comments->isEmpty())
            <h3>Er zijn nog geen reacties</h3>
        @else
            <h3 class="mt-5">Comments</h3>
        @endif

        @foreach($comments as $comment)
            <div class="row mt-4 bg-white p-4">
                <div class="col-3 d-flex align-items-center flex-column bg-light">
                    <img src="{{asset('storage/avatars/avatar.png')}}" width="50px" height="auto" class="mt-3">
                    <p class="mt-2">
                        {{$comment->name}}
                    </p>
                    <p class="text-center">
                        <small>
                            {{$comment->description}}
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
                    @if(Auth::check())
                        <form action="/commentup" method="post" class="form">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$comment->id}}" name="comment_id">
                            <input type="submit" class="btn btn-primary form-control" value="Up">
                        </form>

                        <form action="/commentdown" method="post" class="form">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$comment->id}}" name="comment_id">
                            <input type="submit" class="btn btn-primary form-control" value="Down">
                        </form>

                        @if(Auth::user()->is_admin == true)
                            <form action="/destroy" method="post" class="form">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$comment->id}}" name="comment_id">
                                <input type="submit" class="btn btn-danger form-control" value="X">
                            </form>
                        @endif
                    @endif


                </div>
            </div>
        @endforeach
    </div>

    <div class="container-fluid bg-dark mk-lg">
        Footer of this website!
    </div>
@endsection
