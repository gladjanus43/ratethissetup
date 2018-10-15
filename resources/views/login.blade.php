@extends('layouts.app')


@section('content')
    {!! Form::open(['url' => '']) !!}
        {{Form::label('username')}}
        {{Form::text('username')}}

        {{Form::submit('Log in')}}
    {!! Form::close() !!}
@endsection