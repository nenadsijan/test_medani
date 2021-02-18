@extends('layouts.admin-layout')
@section('content')
<div class="card">
    <div class="card-header">Comments</div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Text</th>
                        <th>User</th>
                        <th>Created at</th>
                        <th>Edit</th>
                    </tr>
                </thead>
         
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ \Illuminate\Support\Str::limit($comment->text, 50, '...') }}</td>
                        <td>{{$comment->user->name}}</td>
                        <td>{{$comment->created_at->format('d-m-Y')}}</td>
                        <td> <a href="{{ route('edit.comment', ['id' =>  $comment -> id ]) }}" class="btn btn-warning">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>    
</div>

@endsection