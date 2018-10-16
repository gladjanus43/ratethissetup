@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
            Logged in
        @else
            Logged out
        @endif
    </div>
@endsection


