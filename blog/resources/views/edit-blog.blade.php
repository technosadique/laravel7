<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <title>Edit Blog</title>
		<style>
		.error{color:red;}
		</style>
	</head>
       <body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
						<h4>
                            Edit Blog
                            <a href="{{ '../' }}" class="btn btn-primary float-right ml-2">
                                Cancel
                            </a>
                        </h4>					
			</div>
			<div class="card-body">	
				<form action="{{ '../update' }}" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-striped">
				 <tr>
				 <td>Title</td> <td><input type="text" name="title" placeholder="title" class="form-control" value="{{$blogs->title}}">
				 @error('title')
				<span class="error">
				{{ $message }}
				</span>
				@enderror
				 <input type="hidden" name="blog_id" placeholder="title" class="form-control" value="{{$blogs->id}}">
				
				</td>
				 </tr>
				 
				 <tr>
				 <td>Image</td> <td><img src="{{ asset('public/uploads/'.$blogs->img)}}" width="100" height="100">				  
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
				 <td></td> <td><input type="submit" name="submit" value="Update" class="btn btn-primary"> <a href="{{ '../' }}" class="btn btn-secondary">Cancel</a></td>
				 </tr>
				
				 </table>	
				</form>
				</div>			
		</div>
	</div>
	</div>
</body>
</html>
