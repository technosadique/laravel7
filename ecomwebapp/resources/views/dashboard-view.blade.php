<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    .wrapper {
      display: flex;
      flex: 1;
    }

    .sidebar {
      width: 200px;
      background: #343a40;
      color: white;
      padding-top: 20px;
    }

    .sidebar a {
      color: white;
      padding: 10px;
      display: block;
      text-decoration: none;
    }

    .sidebar a:hover {
      background: #495057;
    }

    .main {
      flex: 1;
      padding: 20px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">My Dashboard</a>
    <form class="form-inline">
	@if(session()->has('user_id')){
		<a href="{{'logout'}}" class="btn btn-outline-light">Logout</a>
	}@else{
		<a href="{{'/'}}" class="btn btn-outline-light">Login</a>
		<a href="{{'register'}}" class="btn btn-outline-light">Register</a>
	}
     @endif 
    </form>
  </nav>

  <!-- Sidebar + Main Content -->
  <div class="wrapper">
    <div class="sidebar">
      <a href="#">Home</a>
      <a href="#">Profile</a>
      <a href="#">Settings</a>
    </div>
    <div class="main">
      <h2>Welcome, {{session()->get('user_fullname')}}!</h2>
      <p>This is your dashboard content.</p>
    </div>
  </div>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
