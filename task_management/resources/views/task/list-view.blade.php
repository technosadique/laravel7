<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
        <title>Listing</title>
	</head>
       <body>
	<div class="row mt-5 ml-5 mr-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">			
                        <h4>
                            Task Management System
                            <a href="add" class="btn btn-primary float-right ml-2">
                                Add Task
                            </a>	
					
                        </h4>
                    </div>
				<p class="text-center text-success">			  
				@if($message=Session::get('success'))				
				{{$message}}
				@endif			  
				</p>
				<div class="card-body">	
				<div class="form-group">
				<form method="GET" action="{{ 'index' }}">
					<label>Select Project:</label>
						 <select name="project_id" onchange="this.form.submit()" class="form-control">
						<option value="">All</option>
						@foreach($projects as $project)
						<option value="{{ $project->id }}" {{ $selectedProject == $project->id ? 'selected' : '' }}>
						{{ $project->name }}
						</option>
						@endforeach
						</select>
						</form>
					</div>
					
				<table class="table table-bordered table-striped">
				<thead>
				 <tr>
				 <th>#</th>				 
				 <th>Task Name</th>
				 <th>Priority</th>
				 <th>Action</th>
				 </tr>
				 </thead>
				 <tbody id="task-list">
				@forelse($tasks as $key => $row)
				 <tr data-id="{{ $row->id }}">				 
				 <td>{{$key + 1 }}</td>
				 <td>{{ $row->name }}</td>
				 <td>{{ $row->priority }}</td>
								
				 <td><a class="btn btn-primary" href="edit/{{$row->id}}">Edit</a> <a class="btn btn-danger" href="delete/{{$row->id}}" onclick="return confirm('Are you sure to delete this record?');">Delete</a></td>
				 </tr>
				 @empty
				<tr>
					<td colspan="4" style="text-align: center;">No records found.</td>
				</tr>
			    @endforelse	
				</tbody>
				 </table>				
				 {{ $tasks->links()}}			 
				</div>			
			</div>
		</div>
	</div>
<script>
    var el = document.getElementById('task-list');
    var sortable = Sortable.create(el, {
        animation: 150,
        onEnd: function () {
            var order = [];
            document.querySelectorAll('#task-list tr').forEach((row) => {
                order.push(row.getAttribute('data-id'));
            });

            fetch('{{ route("task.reorder") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',                    
                },
                body: JSON.stringify({order: order})
            }).then(response => response.json())
              .then(data => {
                  console.log('Priority updated successfully!');
                  location.reload();
              });
        }
    });
</script>
</body>
</html>