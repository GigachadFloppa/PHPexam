@extends('layouts.app-master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('thing.create') }}"> Create New Product</a>
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
        @foreach ($things as $thing)
            <tr>
                <td><font color="@ownthing($thing->master)">{{ $thing->name }} </font></td> <td>{{ $thing->description }} </td>
                <td>
                    <a class="btn btn-info" href="{{ route('thing.show',$thing->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('thing.edit',$thing->id) }}">Edit</a>
                    <form action="{{ route('thing.destroy',$thing->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
