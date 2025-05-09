<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>      
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
                        <h2>Register</h2>
                    </div>
					<p class="text-center text-danger">@if(session()->has('error'))
							{{session()->get('error')}}							
							@endif
					</p>
				<div class="card-body">				
					<form action="{{ 'registeruser' }}" method="post">
					<div class="form-group">
						<label for="fullname">Fullname</label>
						<input type="fullname" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname">	
						 @error('fullname')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
					
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">	
						 @error('email')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
					
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">	
						 @error('password')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
					
					<button type="submit" class="btn btn-primary">Submit</button> 
					<a href="{{'/'}}" class="btn btn-secondary">Cancel</a>
					</form>			
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>