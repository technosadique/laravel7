<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Listing</title> 
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>
	<div class="container">
        <h2>Product Listing</h2>
		<p><a href="{{ 'add'}}" class="btn btn-success">Add</a></p>
		<p>
		<form action="{{ 'search' }}" method="post">	
			<div class="input-group">
				<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="searchtxt" />
				<input type="submit" class="btn btn-outline-primary" data-mdb-ripple-init value="Search">
			</div>
		</form>
		</p>
			<p class="text-center text-success">			  
			  @if($message=Session::get('success'))				
				{{$message}}
			  @endif			  
			  </p>
		<table class="table table-striped" width="100%">
			<tr>
			<th>S.N</th><th>Photo</th><th>@sortablelink('name')</th><th>Qty</th><th>Action</th>
			</tr>
			<?php $i = 0;$count=0;				
			foreach($products as $row){   
				$doc=($row->doc) ? $row->doc:'default.gif';			
				$i+=$row->qty;
				$count++;
			?>
			<tr><td><?php echo $count; ?></td><td><img src="{{ asset('public/uploads/'.$doc)}}" width="50" height="50"></td><td>{{ $row->name }}</td><td>{{ $row->qty }}</td><td><a href="{{ 'edit/'.$row->id  }}" class="btn btn-success">Edit</a> <a href="{{ 'delete/'.$row->id  }}" onclick="return confirm('r u sure to delete?')" class="btn btn-danger">Delete</a></td></tr>
			<?php } ?>
			<tr><td colspan="3">Total:</td><td>{{ number_format($i,2)}}</td><td></td></tr>
		</table>
		{{ $products->links()}}
		</div>
    </body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</html>