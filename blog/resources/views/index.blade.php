@extends('layouts.app')

@section('content')
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
				
				@foreach($blogs as $row)	
				 <tr>				 
				 <td>{{ $row->id}}</td>
				 <td>{{ $row->title}}</td>
				 <td><a class="btn btn-primary" href="{{ route('edit', [$row->id]) }}">Edit</a> <a class="btn btn-danger" href="{{ route('delete', [$row->id]) }}" onclick="return confirm('r u sure to delete?')">Delete</a></td>
				 </tr>
				@endforeach
				
				 </table>	
				<p>{{ $blogs->links()}}</p>				 
				</div>			
		</div>
	</div>
	</div>
    
@endsection
