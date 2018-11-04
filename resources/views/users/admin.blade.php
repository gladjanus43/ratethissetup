@extends('layouts.app')

@section('content')
    <div class="container col-6 offset-3">
        @foreach($users as $user)
            <div class="row p-3 mt-3 bg-white">
                <div class="col-2">
                    <img src="{{asset('storage/avatars/avatar.png')}}" width="100%" height="auto"/>
                </div>
                <div class="col-8">
                    <h4>{{$user->name}}</h4>
                    <p>{{$user->email}}</p>
                </div>
                <div class="col-2 d-flex flex-column justify-content-between">
                    @if($user->is_admin == true)
                        <button class="btn btn-primary"><a href="/removeadmin/{{$user->id}}" style="color: white">Remove admin</a></button>
                    @else
                        <button class="btn btn-primary"><a href="/makeadmin/{{$user->id}}" style="color: white">Make admin</a></button>
                    @endif

                    <button class="btn btn-danger"><a href="/deleteuser/{{$user->id}}" style="color: white">Delete user</a></button>
                </div>

            </div>
        @endforeach

    </div>
@endsection