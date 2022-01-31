@extends('layouts.app-master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('thing.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('thing.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">

                    <strong>Master:</strong>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <select class="form-control" name="master">
                                <option value="NULL">
                                    нету
                                </option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">
                                        {{ $user->username}}
                                    </option>
                                @endforeach()
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <strong>wrnt:</strong>
                    <textarea class="form-control" style="height:150px" name="wrnt" placeholder="Description"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" name="place">
                    <strong>Place:</strong>

                    <select class="form-control" name="place">
                        <option value="NULL">
                            нету
                        </option>
                        @foreach($places as $place)
                            <option value="{{ $place->id }}">
                                {{ $place->name}}
                            </option>
                        @endforeach()
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User:</strong>
                    <select class="form-control" name="user">
                        <option value="NULL">
                            нету
                        </option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}" >
                                {{ $user->username}}
                            </option>
                        @endforeach()
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
