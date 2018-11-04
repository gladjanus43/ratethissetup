@extends('layouts.app')

@section('content')
    <div class="container col-6 offset-3 mt-3 bg-white p-3">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-setups" role="tab"
                   aria-controls="nav-profile" aria-selected="false">Setups</a>
                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-data" role="tab"
                   aria-controls="nav-home" aria-selected="true">Personal Data</a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-setups" role="tabpanel" aria-labelledby="nav-setups-tab">
                @foreach($setups as $setup)
                    <div class="container bg-white mt-5 p-3">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{asset('storage/pictures/'. $setup->id . '.png')}}" width="100%"
                                     height="auto"/>
                            </div>
                            <div class="col-6">
                                <h4>{{$setup->title}}</h4>
                                <p>{{$setup->description}}</p>
                            </div>
                            <div class="col-3 d-flex flex-column align-items-center">
                                <h4>Show public?</h4>
                                <form class="mt-2" action="/setupActive" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$setup->id}}" name="id">
                                    <div class="d-flex justify-content-center mb-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="isActive" value="1"
                                                   @if($setup->is_active == true)checked="true" @endif>
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="isActive" value="0"
                                                   @if($setup->is_active == false)checked="true" @endif>
                                            <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Save changes" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="tab-pane fade" id="nav-data" role="tabpanel" aria-labelledby="nav-data-tab">
                <div class="container mt-2">
                    <form method="post" action="/userdetails">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" placeholder="Name" name="name" class="form-control"
                                   value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Email" name="email" class="form-control"
                                   value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Description of yourself" name="description" class="form-control"
                                   value="{{$user->description}}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Confirm changes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection