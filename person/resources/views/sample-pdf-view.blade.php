<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<h3>Persons Listing</h3>
<table class="styled-table">
    <thead>
        <tr>
            <th>Id</th>  
            <th>Name</th>  
            <th>Age</th>            
            <th>Dept</th>            
        </tr>
    </thead>
    <tbody>
	<?php  foreach($persons as $row){?>
        <tr>
            <td><?php echo $row->id;?></td>            
            <td><?php echo $row->name;?></td>            
            <td><?php echo $row->age;?></td>  
            <td><?php echo $row->dept;?></td>  
        </tr>
	<?php }  ?>        
    </tbody>
</table>
</body>
</html>