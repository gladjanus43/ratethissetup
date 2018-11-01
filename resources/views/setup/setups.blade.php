@extends('layouts.app')

@section('content')
    @foreach($setups as $setup)
        <a href="/setup/{{$setup->id}}">
            <div class="container">
                <h4>{{$setup->title}}</h4>
                <p>{{$setup->description}}</p>
            </div>
        </a>
    @endforeach
@endsection()