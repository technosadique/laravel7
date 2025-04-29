@extends('layouts.app')
@section('title', 'Add')
@section('content')
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
						<h4>
                            Add Blog
                            <a href="{{ './' }}" class="btn btn-primary float-right ml-2">
                                Cancel
                            </a>
                        </h4>					
			</div>
			<div class="card-body">	
				<form action="{{ 'store' }}" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-striped">
				 <tr>
				 <td>Title</td> <td><input type="text" name="title" placeholder="title" class="form-control">
				  @error('title')
				<span class="error">
				{{ $message }}
				</span>
				@enderror
				 </td>
				 </tr>
				 
				 
				 
				 <tr>
				 <td>Upload Image</td> <td><input type="file" name="img" class="form-control">
				  @error('img')
				<span class="error">
				{{ $message }}
				</span>
				@enderror
				 </td>
				 </tr>
				 
				 
				 <tr>
				 <td></td> <td><input type="submit" name="submit" value="Submit" class="btn btn-primary"> <a href="{{ './' }}" class="btn btn-secondary">Cancel</a>	</td>
				 </tr>
				
				 </table>	
				</form>
				</div>			
		</div>
	</div>
	</div>
@endsection
