<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Product</title>  
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
	<style>
	span{color:red;}
	</style>
    <body>
	<div class="container">
        <h2>Add Product</h2>
		<form name="product-add-form" action="{{'store'}}" method="post" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
			@error('name')
				<span>
				{{ $message }}
				</span>
				@enderror
		  </div>
		  
		  <div class="form-group">
			<label for="name">Qty</label>
			<input type="text" class="form-control" placeholder="Enter qty" id="qty" name="qty">
			@error('qty')
				<span>
				{{ $message }}
				</span>
				@enderror
		  </div>
		  
		  <div class="form-group">
			<label for="name">Upload File</label>
			<input type="file" class="form-control" placeholder="Enter qty" id="doc" name="doc">
			@error('doc')
				<span>
				{{ $message }}
				</span>
				@enderror
		  </div>
		  
		  
		<input type="submit" class="btn btn-primary" value="Add">		
		<a href="{{ './' }}" class="btn btn-secondary">Cancel</a>		
    </body>
	<form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>