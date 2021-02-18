@extends('layouts.admin-layout')
@section('content')
<div class="card">
    <div class="card-header card-header-danger">
     	 <h4 class="card-title ">Edit {{$user->name}}</h4>
    </div>
    <div class="card-body">
		<form method="post" action="{{ route('update.user',  $user -> id) }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="name">Name</label>
			    <input type="text" class="form-control" value="{{$user->name}}" name="name" id="name" aria-describedby="name" placeholder="Edit name" required="">
			</div>
			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" value="{{$user->email}}" name="email" id="email" aria-describedby="email" placeholder="Edit email" required="">
			</div>
			<div class="form-group">
	       		<div class="togglebutton">
				  <label>
				  	  User
				   <input name='role' type='hidden' value='0'>
		           <input type="checkbox"  name='role' data-toggle="toggle" {{ $user->is_admin == 1 ? 'checked' : '' }}  value='1' data-size="xs">               
				      <span class="toggle"></span>
				        Admin
				  </label>
			    </div>
			</div> 
				<button type="submit" class="btn btn-primary">Submit</button>
	  	</form>
	</div>  	
</div>

@endsection