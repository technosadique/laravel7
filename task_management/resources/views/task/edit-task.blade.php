<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Task</title>  
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
                        <h2>Edit Task</h2>
                    </div>
				<div class="card-body">				
					<form action="{{ '../update' }}" method="post">
					
					<div class="form-group">
					<label>Project:</label>
						<select name="project_id" class="form-control">
						@foreach($projects as $project)
						<option value="{{ $project->id }}" {{ (isset($tasks) && $tasks->project_id == $project->id) ? 'selected' : '' }}>
						{{ $project->name }}
						</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label for="name">Task Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter task name" value="{{ $tasks->name }}">
						<input type="hidden" name="id" value="{{ $tasks->id }}">
						 @error('name')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>	

					<div class="form-group">
					<label for="priority">Priority</label>
						<select name="priority" class="form-control">
						<option value="low" {{ $tasks->priority == 'low' ? 'selected' : '' }}>Low</option>
						<option value="medium" {{ $tasks->priority == 'medium' ? 'selected' : '' }}>Medium</option>
						<option value="high" {{ $tasks->priority == 'high' ? 'selected' : '' }}>High</option>
						</select>
						@error('priority')
						<span>
						{{ $message }}
						</span>
						@enderror
					</div>
									
					
					<button type="submit" class="btn btn-primary">Update</button> 
					<a href="{{'../'}}" class="btn btn-secondary">Cancel</a> 
					</form>			
				</div>
			</div>
		</div>
	</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>