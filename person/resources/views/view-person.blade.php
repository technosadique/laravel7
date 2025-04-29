<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View</title>  
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
	<style>
	span{color:red;}
	</style>
	<body>
		<div class="row mt-5 ml-5 mr-5">
			<div class="col-md-12">
				<div class="card" style="width:400px">
					<img class="card-img-top" src="{{asset('public/uploads/'.$persons->doc)}}" alt="Card image" >
					<div class="card-body">
						<h4 class="card-title">Name: {{ $persons->name }}</h4>
						<p class="card-text">Age: {{ $persons->age }}</p>
						<p class="card-text">Department: {{ $persons->dept }}</p>
						<a href="{{'../'}}" class="btn btn-secondary">Cancel</a> 
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>