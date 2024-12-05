<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Product</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">       
    </head>
	<style>
	span{color:red;}
	</style>
    <body>
	<div class="container">
        <h2>Edit Product</h2>
		<form name="product-add-form" action="{{ '../update'}}" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="{{ $products->name}}"><input type="hidden" name="id" value="{{ $products->id}}">
			@error('name')
				<span>
				{{ $message }}
				</span>
				@enderror
		</div>
		  
		<div class="form-group">
			<label for="qty">Qty</label>
			<input type="text" class="form-control" placeholder="Enter qty" id="name" name="qty" value="{{ $products->qty}}">
			@error('qty')
				<span>
				{{ $message }}
				</span>
				@enderror
		</div>
		
		<div class="form-group">
			<label for="qty">Image</label>
			<img src="{{ asset('public/uploads/'.$products->doc)}}" width="100" height="100">
		</div>
		
		<div class="form-group">
			<label for="name">Upload File</label>
			<input type="file" class="form-control" id="doc" name="doc">
			@error('doc')
				<span>
				{{ $message }}
				</span>
				@enderror
		  </div>
		
		
		
		<input type="submit" name="submit" value="Update" class="btn btn-primary"> <a href="{{ '../' }}" class="btn btn-secondary">Cancel</a>				
    </body>
	</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>
