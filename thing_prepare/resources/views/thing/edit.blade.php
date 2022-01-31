@extends('layouts.app-master')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('thing.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('thing.update',$thing->id) }}" method="POST">
        @csrf

        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $thing->title }}" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $thing->description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Place:</strong>

                    <select class="form-control">
                        <option id="NULL" name="place">
                            нету
                        </option>
                        @foreach($places as $place)
                            <option id="{{ $place->id }}" name="place">
                                {{ $place->name}}
                            </option>
                        @endforeach()
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:</strong>
                    <select class="form-control">
                        <option id="NULL" name="user">
                            нету
                        </option>
                        @foreach($users as $user)
                            <option id="" name="user">
                                {{ $user->username}}
                            </option>
                        @endforeach()
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <strong>Work</strong>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
