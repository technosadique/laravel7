<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Task</title>      
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
                        <h2>Add Task</h2>
                    </div>
				<div class="card-body">				
					<form action="{{ 'store' }}" method="post">
					
					<div class="form-group">
					<label>Project:</label>
						<select name="project_id" class="form-control">
						@foreach($projects as $project)
						<option value="{{ $project->id }}">
						{{ $project->name }}
						</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label for="name">Task Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter task name">	
						 @error('name')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>	

					<div class="form-group">
					<label for="priority">Priority</label>
						<select name="priority" required class="form-control">
						<option value="low">Low</option>
						<option value="medium">Medium</option>
						<option value="high">High</option>
						</select>
						@error('priority')
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