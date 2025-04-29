<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add</title>      
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
	<style>
	span{color:red;}
	</style>
	<body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
					<div class="card-header">
                        <h2>Add</h2>
                    </div>
				<div class="card-body">				
					<form action="{{ 'store' }}" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">	
						 @error('name')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
					
					
					<div class="form-group">
						<label for="age">Age</label>
						<input type="text" class="form-control" id="age" name="age" placeholder="Enter age">	
						 @error('age')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="doc">Attach file</label>
						<input type="file" class="form-control" id="doc" name="doc">	
						 @error('doc')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
					
					<button type="submit" class="btn btn-primary">Submit</button> 
					<a href="{{'./'}}" class="btn btn-secondary">Cancel</a> 
					</form>			
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>