@extends('layouts.app-master')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('place.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        @foreach ($places as $place)
            <tr>
                <td><font color='red'>{{ $place->name }}</font>
                </td> <td>{{ $place->description }} </td>
                <td>
                    <a class="btn btn-info" href="{{ route('place.show',$place->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('place.edit',$place->id) }}">Edit</a>
                    <form action="{{ route('place.destroy',$place->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
