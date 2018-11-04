@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-dark p-3">
        <div class="col-6 offset-3 d-flex justify-content-between">
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

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter on category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($categories as $category)
                        <a class="dropdown-item" href="/setups/category/{{$category->name}}/">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container col-6 offset-3">
        @if($filters == " ")
            <small>Apply filters via the textboxes or via the dropdown menu</small>
        @else
            <a href="/setups">
                <small>Clear these filters: {{$filters}}</small>
            </a>
        @endif
    </div>



    <div class="container col-6 offset-3">
        @foreach($setups as $setup)
            <div class="row p-3">
                <div class="col-4">
                    <img src="{{asset('storage/pictures/' . $setup->id . '.png')}}" width="100%" height="auto"/>
                </div>
                <div class="col-6">
                    <a href="/setup/{{$setup->id}}">
                        <h4>{{$setup->title}}</h4>
                        <p>{{$setup->description}}</p>
                    </a>
                </div>
                <div class="col-2">
                    Number of comments:
                    {{$setup->amount_comments}}
                </div>
            </div>
        @endforeach
    </div>
@endsection()