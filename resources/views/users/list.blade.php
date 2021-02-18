@extends('layouts.admin-layout')
@section('content')
<div class="card">
    <div class="card-header">Users</div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Created at</th>
                        <th>Edit</th>
                    </tr>
                </thead>
         
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>	
                        	@if($user->is_admin== true)
                        		Admin
                        	@else
                        		User
                        	@endif
                        </td>
                        <td>{{$user->created_at->format('d-m-Y')}}</td>
                        <td>
                        	@if($user->is_admin == false)
                        	 <a href="{{ route('edit.user', ['id' =>  $user -> id ]) }}" class="btn btn-warning">Edit</a>
          					@else
          					Admin cannot be edited
                        	@endif 
                     	</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>    
</div>

@endsection