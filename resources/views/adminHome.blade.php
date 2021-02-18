@extends('layouts.admin-layout')
@section('content')
    
                <div class="row">
                    <div class="col-lg-4 pb-4">
                        <div class="card border-info mx-sm-1 p-3">
                            <div class="text-info text-center mt-3"><h1>Posts</h1></div>
                            <div class="text-info text-center mt-2"><a href="{{route('posts')}}" class="btn btn-info">Posts</a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 pb-4">
                        <div class="card border-success mx-sm-1 p-3">
                            <div class="text-info text-center mt-3"><h1>Users</h1></div>
                            <div class="text-info text-center mt-2"><a href="{{route('users')}}" class="btn btn-info">Users</a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 pb-4">
                        <div class="card border-danger mx-sm-1 p-3">
                            <div class="text-info text-center mt-3"><h1>Comments</h1></div>
                            <div class="text-info text-center mt-2"><a href="{{route('comments')}}" class="btn btn-info">Comments</a></div>
                        </div>
                    </div>
                </div>
  

@endsection