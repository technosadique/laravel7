<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <title>Listing</title>
	</head>
       <body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>
                            Listing
                            <a href="{{ 'create' }}" class="btn btn-primary float-right ml-2">
                                Add
                            </a>
                        </h4>					
			</div>
			<p class="text-center text-success">@if($message = Session::get('success'))
			{{$message}}
			
			@endif</p>
			<div class="card-body">	
				<table class="table table-bordered table-striped">
				 <tr>
				 <th>@sortablelink('id')</th>				 
				 <th>@sortablelink('title')</th>				 
				 <th>Action</th>
				 </tr>
				@if($blogs->count())
				@foreach($blogs as $row)	
				 <tr>				 
				 <td>{{ $row->id}}</td>
				 <td>{{ $row->title}}</td>
				 <td><a class="btn btn-primary" href="{{ 'edit/'.$row->id }}">Edit</a> <a class="btn btn-danger" href="{{ 'delete/'.$row->id }}" onclick="return confirm('r u sure to delete?')">Delete</a></td>
				 </tr>
				@endforeach
				@endif
				 </table>	
				<p>{{ $blogs->links()}}</p>				 
				</div>			
		</div>
	</div>
	</div>
</body>
</html>
