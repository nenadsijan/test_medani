@extends('layouts.admin-layout')
@section('content')
<div class="card">
    <div class="card-header">Posts</div>
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
     
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at->format('d-m-Y')}}</td>
                    <td> <a href="{{ route('edit.post', ['id' =>  $post -> id ]) }}" class="btn btn-warning">Edit</a></td>
                    <td> <a href="{{ route('destroy.post', ['id' =>  $post -> id ]) }}" class="btn btn-danger">Remove</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
       <a href="{{route('create.post')}}" class="btn btn-success">Create Post</a>
    </div>
</div>

@endsection