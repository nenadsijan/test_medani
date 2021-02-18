@extends('layouts.admin-layout')
@section('content')
<div class="card">
    <div class="card-header card-header-danger">
     	 <h4 class="card-title ">Create Post</h4>
    </div>
    <div class="card-body">
		<form method="post" action="{{ url('/store-post') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
			    <label for="title">Title</label>
			    <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Enter title" required="">
			</div>
			<div class="form-group">
			    <label for="text">Text</label>
			    <textarea id="text" name="text" class="form-control" rows="4" cols="50" placeholder="Enter title" required=""></textarea>
			</div>
			<div class="form-group">
				<div class="togglebutton">
				 <label>
						Do not publish
					<input name='publish' type='hidden' value='0'>
					<input type="checkbox"  name='publish' data-toggle="toggle"  value='1' data-size="xs">
					<span class="toggle"></span>
						Publish
				 </label>
				</div>
			</div> 
				<button type="submit" class="btn btn-primary">Submit</button>
	  	</form>
	</div>  	
</div>

@endsection